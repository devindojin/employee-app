<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Traits\FileUploadsTrait;
use App\Repositories\Traits\FileDeletesTrait;
use App\Repositories\Traits\CurlRequestTrait;

use DB;
use App\User;

use Auth;

class JobController extends Controller
{
	use FileUploadsTrait;
    use FileDeletesTrait;
	use CurlRequestTrait;

    public function jobs () {

    	$token = env("ZOHO_ACCESS_TOKEN");

    	$getUrl = "https://recruit.zoho.com/recruit/private/json/JobOpenings/getRecords?authtoken=$token&scope=recruitapi";

    	$response = $this->request($getUrl,"GET");

    	$resArr = json_decode($response);
    	
    	$i = 0;
    	
    	$jobsArr = [];

    	foreach ($resArr->response->result->JobOpenings->row as $value) {
    		foreach ($value->FL as $value2) {
    			$key = str_replace(' ','_',strtolower($value2->val));
    			$jobsArr[$i][$key] = $value2->content;
    		}
    		$i++;
    	}

    	return view('jobs.searchResult',['data' => $jobsArr]);
    }

    public function job (Request $request)
    {
    	$token = env("ZOHO_ACCESS_TOKEN");
    	
    	$id = $request->id;
    	
    	$getUrl = "https://recruit.zoho.com/recruit/private/json/JobOpenings/getRecordById?&authtoken=$token&scope=recruitapi&version=2&id=$id";
    	
    	$response = $this->request($getUrl,"GET");

    	$resArr = json_decode($response);

    	if (isset($resArr->response->nodata)) {
    		return abort(404);
    	} else {

	    	$jobArr = [];

	    	foreach ($resArr->response->result->JobOpenings->row->FL as $value) {
	    		$key = str_replace(' ','_',strtolower($value->val));
	    		$jobArr[$key] = $value->content;
	    	}
    		
    		return view('jobs.jobPage',['data'=>$jobArr]);
    	}

    }

    public function applyJob (Request $request) 
    {
    	if (Auth::check()) {
    		$id = Auth::user()->id;
    		$jobId = $request->id;

    		$this->applyJobInZoho($id,$jobId);
    	} else {
    		$this->applyJobAsNewUser($request);
    	}
    	
    	return redirect()->route('job', ['id'=>$jobId,'action'=>'applied']);
    }


    public function applyJobAsNewUser (Request $request)
    {
    	$request->validate([
    		'first_name' => 'required|min:3|max:50',
    		'last_name' => 'required|min:3|max:50',
    		'email' => 'required',
            'uploadCv' => 'required|file|max:1024|mimes:doc,docx,pdf',
        ]);

        $fileInfo = $this->uploadFile($request,"uploadCv");
        
        $User = new User;

        $User->civility = $request->civility;
        $User->name = $request->first_name;
        $User->last_name = $request->last_name;
        $User->email = $request->email;
        $User->password = Hash::make("admin123");
        $User->file_name = $fileInfo;

        $User->save();

        $jobId = $request->id;

        $this->addCandidateInfoInZoho($User,$jobId);
    }

    public function addCandidateInfoInZoho ($User,$jobId)
    {
    	$token = env("ZOHO_ACCESS_TOKEN");

    	$fileInfo = $User->file_name;
        $updateUser = User::find($User->id);

        $insertXml = '<Candidates><row no="1"><FL val="First Name">'.$User->name.'</FL><FL val="Last Name">'.$User->last_name.'</FL><FL val="Email">'.$User->email.'</FL></row></Candidates>';
        
        $finalXml = urlencode($insertXml);
        
        $insertUrl = "https://recruit.zoho.com/recruit/private/json/Candidates/addRecords?authtoken=$token&scope=recruitapi&version=2&xmlData=$finalXml";

        $response = $this->request($insertUrl,"POST");

        $resArr = json_decode($response);
        
        $recordArr = [];

        foreach ($resArr->response->result->recorddetail->FL as $value) {
            $key = str_replace(' ','_',strtolower($value->val));
            $recordArr[$key] = $value->content;
        }

        $updateUser->zr_id = $recordArr['id'];

        $updateUser->save();

        // update cv
        $recruitId = $recordArr['id'];
        $file = public_path('storage/'.$fileInfo);
        $requestUrl = "https://recruit.zoho.com/recruit/private/json/Candidates/uploadFile?authtoken=$token&scope=recruitapi&type=Resume&version=2";

        $req = $this->request($requestUrl,"FILE",array(),$recruitId,$file);

		
		
		$this->applyJobInZoho($User->id,$jobId);
    }

    public function applyJobInZoho ($id,$jobId)
    {
    	$token = env("ZOHO_ACCESS_TOKEN");

        $User = User::findorFail($id);

        $candidateId = $User->zr_id;

    	

    	$applyUrl = "https://recruit.zoho.com/recruit/private/json/Candidates/changeStatus?authtoken=$token&scope=recruitapi&jobId=$jobId&candidateIds=$candidateId&candidateStatus=Associated&comments=PlacedinJavaDevelopment";

    	$res = $this->request($applyUrl,"POST");
	}
}
