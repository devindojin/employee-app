<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Traits\FileUploadsTrait;
use App\Repositories\Traits\FileDeletesTrait;
use App\Repositories\Traits\CurlRequestTrait;

use Illuminate\Support\Facades\File;

use DB;
use App\User;
use App\JobsApplied;

use Auth;

class JobController extends Controller
{
	use FileUploadsTrait;
    use FileDeletesTrait;
	use CurlRequestTrait;

    public function searchJobs ()
    {
        return view('jobs.searchJobs',['cat'=>'']);
    }

    public function searchJobsPost (Request $request)
    {
        $cat = $request->selectCat;
        $local = $request->selectLoc;

        return redirect()->route('jobs',[
            'from' => 1,
            'to' => 20,
            'cat' => $cat,
            'loc' => $local
        ]);

    }

    public function jobs (Request $request) 
    {

    	$token = env("ZOHO_ACCESS_TOKEN");

        if (!isset($request->from) && !isset($request->to)) {
            $fromIndex = "1";
            $toIndex = "20";
        } else {
            $fromIndex = $request->from;
            $toIndex = $request->to;
        }


        $cols = urlencode("Posting Title,Client Name,Job Type,Industry,Date Opened");

        if(isset($request->cat) && $request->cat != "") {
            $cat = $request->cat;
            $con = urlencode("Industry|=|$cat");
            $searchStr = '&searchCondition=('.$con.')';

            $getUrl = "https://recruit.zoho.eu/recruit/private/json/JobOpenings/getSearchRecords?authtoken=$token&scope=recruitapi&version=2&newFormat=1&selectColumns=JobOpenings($cols)$searchStr&fromIndex=$fromIndex&toIndex=$toIndex";

        } else {
            $cat = "";

            $getUrl = "https://recruit.zoho.eu/recruit/private/json/JobOpenings/getRecords?authtoken=$token&scope=recruitapi&fromIndex=$fromIndex&toIndex=$toIndex";
        }

        

    	$response = $this->request($getUrl,"GET");

    	$resArr = json_decode($response);
    	// dd($resArr);
    	$i = 0;
    	
    	$jobsArr = [];

        if(isset($resArr->response->result)) {
        	foreach ($resArr->response->result->JobOpenings->row as $value) {
        		if(isset($value->FL)) {
                    foreach ($value->FL as $value2) {
                        $key = str_replace(' ','_',strtolower($value2->val));
                        $jobsArr[$i][$key] = $value2->content;
                    }
                    $i++;                
                } else {
                    $jobsArr = [];
                }

        	}
        } else {

                $jobsArr = [];
        }

    	return view('jobs.searchResult',[
            'data' => $jobsArr, 
            'from' => $toIndex+1, 
            'to' => $toIndex+20,
            'cat' => urlencode($cat)
        ]);
    }

    public function job (Request $request)
    {
    	$token = env("ZOHO_ACCESS_TOKEN");
    	
    	$id = $request->id;
    	
    	$getUrl = "https://recruit.zoho.eu/recruit/private/json/JobOpenings/getRecordById?&authtoken=$token&scope=recruitapi&version=2&id=$id";
    	

    	$response = $this->request($getUrl,"GET");

    	$resArr = json_decode($response);

    	if(isset($resArr->response->result)) {
            $jobArr = [];

            foreach ($resArr->response->result->JobOpenings->row->FL as $value) {
                $key = str_replace(' ','_',strtolower($value->val));
                $jobArr[$key] = $value->content;
            }
            
            return view('jobs.jobPage',['data'=>$jobArr]);
        } else {
    		return abort(404);
        }

    }

    public function applyJob (Request $request) 
    {
        $favApply = $request->favourite;

        if($favApply) {
            $favJobApp = new JobsApplied;

            $favJobApp->user_id = Auth::user()->id;
            $favJobApp->job_id = $request->id;

            $favJobApp->save();   
        }

        $this->createCoverLetter($request);
    	
        if (Auth::check()) {
    		$id = Auth::user()->id;
    		$jobId = $request->id;

    		$this->applyJobInZoho($id,$jobId);
    	} else {
    		$this->applyJobAsNewUser($request);
    	}
    	
    	return redirect()->route('job', ['id'=>$jobId,'action'=>'applied']);
    }

    public function createCoverLetter (Request $request)
    {
        $content = $request->cover_letter;
        $fileName = Auth::user()->id.'_'.$request->id.'.txt';
        $uploadPath = storage_path('app/public/cover_letter'); 
        $filePath = $uploadPath.'/'.$fileName;

        if (! File::isDirectory($uploadPath)) {
            // Creating directory structure
            File::makeDirectory($uploadPath, 0775, true);
        }

        $fp = fopen($filePath, 'w');
        fwrite($fp, $content);
        fclose($fp);

        $token = env("ZOHO_ACCESS_TOKEN");
        $heading = urlencode("Cover Letter");
        $recruitId = Auth::user()->zr_id;
        // $file = public_path('storage/app/public/cover_letter/'.$fileName);
        $requestUrl = "https://recruit.zoho.eu/recruit/private/json/Candidates/uploadFile?authtoken=$token&scope=recruitapi&type=$heading&version=2";

        $req = $this->request($requestUrl,"FILE",array(),$recruitId,$filePath,"cover_letter.txt");
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
        
        $insertUrl = "https://recruit.zoho.eu/recruit/private/json/Candidates/addRecords?authtoken=$token&scope=recruitapi&version=2&xmlData=$finalXml";

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
        $requestUrl = "https://recruit.zoho.eu/recruit/private/json/Candidates/uploadFile?authtoken=$token&scope=recruitapi&type=Resume&version=2";

        $req = $this->request($requestUrl,"FILE",array(),$recruitId,$file);

		
		
		$this->applyJobInZoho($User->id,$jobId);
    }

    public function applyJobInZoho ($id,$jobId)
    {
    	$token = env("ZOHO_ACCESS_TOKEN");

        $User = User::findorFail($id);

        $candidateId = $User->zr_id;

    	

    	$applyUrl = "https://recruit.zoho.eu/recruit/private/json/Candidates/associateJobOpening?authtoken=$token&scope=recruitapi&jobIds=$jobId&candidateIds=$candidateId&candidateStatus=Associated&comments=PlacedinJavaDevelopment";

    	$res = $this->request($applyUrl,"POST");
	}


    public function jobsAppliedCh ()
    {
        $token = env("ZOHO_ACCESS_TOKEN");

        $candidateId = Auth::user()->zr_id;

        $getUrl = "https://recruit.zoho.eu/recruit/private/json/Candidates/getAssociatedJobOpenings?&authtoken=$token&scope=recruitapi&version=2&id=$candidateId";

        $res = $this->request($getUrl,"GET");
        
        $resArr = json_decode($res);
        
        $jobsIdArr = [];

        if(isset($resArr->response->result)) {
            $i = 0;
            foreach ($resArr->response->result->Candidates->row as $value) {
                if(isset($value->FL)) {
                    // $key = str_replace(' ','_',strtolower($value->FL[0]->val));
                    $jobsIdArr[$i] = $value->FL[0]->content;
                }
            $i++;
            }
        }
        
        $j = 0;
        $jobArr = [];
        if(count($jobsIdArr)>0) {
            foreach ($jobsIdArr as $jobId) {

                $getJobDetailUrl = "https://recruit.zoho.eu/recruit/private/json/JobOpenings/getRecordById?&authtoken=$token&scope=recruitapi&version=2&id=$jobId";

                $getJobDetail = $this->request($getJobDetailUrl,"GET");

                $getJobDetailArr = json_decode($getJobDetail);

                if(isset($getJobDetailArr->response->result)) {
                    
                    foreach ($getJobDetailArr->response->result->JobOpenings->row->FL as $value2) {
                        $key = str_replace(' ','_',strtolower($value2->val));
                        $jobArr[$j][$key] = $value2->content;
                    }
                } else {
                    return abort(404);
                }
            $j++;
            }
        }

        return view('jobs.jobsApplied',['jobsAppArr'=>$jobArr]);
    }

    public function jobsApplied ()
    {
        $token = env("ZOHO_ACCESS_TOKEN");

        $userId = Auth::user()->id;
        $candidateId = Auth::user()->zr_id;

        $jobsApplied = JobsApplied::where('user_id',$userId)->get();

        $j = 0;
        $jobArr = [];
        
        if(count($jobsApplied)>0) {
            foreach ($jobsApplied as $jobDataArr) {
                
                $recordId = $jobDataArr->id;
                
                $jobId = $jobDataArr->job_id;

                $getJobDetailUrl = "https://recruit.zoho.eu/recruit/private/json/JobOpenings/getRecordById?&authtoken=$token&scope=recruitapi&version=2&id=$jobId";

                $getJobDetail = $this->request($getJobDetailUrl,"GET");

                $getJobDetailArr = json_decode($getJobDetail);

                if(isset($getJobDetailArr->response->result)) {
                    
                    foreach ($getJobDetailArr->response->result->JobOpenings->row->FL as $value2) {
                        $key = str_replace(' ','_',strtolower($value2->val));
                        $jobArr[$j][$key] = $value2->content;
                        $jobArr[$j]['record_id'] = $recordId;
                    }
                } else {
                    return abort(404);
                }
            $j++;
            }
        }

        return view('jobs.jobsApplied',['jobsAppArr'=>$jobArr]);
    }

    public function removeFav (Request $request)
    {
        $id = $request->id;

        $jobsApplied = JobsApplied::find($id);
        
        $jobsApplied->delete();

        return redirect()->back();

    }
}
