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
        $sortFieldStr = urlencode("Date Opened");

        if(isset($request->cat) && $request->cat != "") {
            $cat = $request->cat;
            $con = urlencode("Catégorie métiers|=|$cat");
            // $con2 = urlencode("Zip Code|=|75000");
            $searchStr = '&searchCondition=('.$con.')';

            $getUrl = "https://recruit.zoho.eu/recruit/private/json/JobOpenings/getSearchRecords?authtoken=$token&scope=recruitapi&version=2&newFormat=1&selectColumns=JobOpenings($cols)$searchStr&fromIndex=$fromIndex&toIndex=$toIndex&sortColumnString=$sortFieldStr&sortOrderString=desc";

        } else {
            $cat = "";
            $con = urlencode("Job Opening Status|=|En cours");
            $searchStr = '&searchCondition=('.$con.')';

            $getUrl = "https://recruit.zoho.eu/recruit/private/json/JobOpenings/getSearchRecords?authtoken=$token&scope=recruitapi&version=2&newFormat=1&selectColumns=JobOpenings($cols)$searchStr&fromIndex=$fromIndex&toIndex=$toIndex&sortColumnString=$sortFieldStr&sortOrderString=desc";
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
        $jobId = $request->id;

        if($favApply) {
            $status = $this->favJobApply($request);
            return redirect()->route('jobs')->withSuccess($status);
        } else {
        		
            if (Auth::check()) {
                
        		$id = Auth::user()->id;
                $recruitId = Auth::user()->zr_id;
                $this->createCoverLetter($request,$recruitId);
        		$this->applyJobInZoho($id,$jobId);
                $this->zohoJobApply($request);
        	} else {
                $this->applyJobAsNewUser($request);
        	}
            
        	return redirect()->route('job', ['id'=>$jobId,'action'=>'applied']);
        }
    }

    public function favJobApply (Request $request)
    {
        $appJobs = JobsApplied::where([
            ['user_id','=',Auth::user()->id],
            ['job_id','=',$request->id],
            ['flag','=','saved']
        ])->get();

        if(count($appJobs)>0) {
            $status = "Vous avez déjà enregistré cette offre";
        } else {
            $favJobApp = new JobsApplied;

            $favJobApp->user_id = Auth::user()->id;
            $favJobApp->job_id = $request->id;
            $favJobApp->flag = "saved";

            $favJobApp->save();

            $status = "Vous avez enregistré ce poste !";
        }

        return $status;
    }

    public function zohoJobApply (Request $request)
    {
        $appJobs = JobsApplied::where([
            ['user_id','=',Auth::user()->id],
            ['job_id','=',$request->id],
            ['flag','=','applied']
        ])->get();

        if(count($appJobs)>0) {
            $status = "Vous avez déjà candidaté à ce poste !";
        } else {
            $favJobApp = new JobsApplied;

            $favJobApp->user_id = Auth::user()->id;
            $favJobApp->job_id = $request->id;
            $favJobApp->flag = "applied";

            $favJobApp->save();

            $status = "Vous avez candidaté avec succès à ce poste ! ";
        }
    }

    public function applyJobAsNewUser (Request $request)
    {
    	$request->validate([
    		'first_name' => 'required|min:3|max:50',
    		'last_name' => 'required|min:3|max:50',
    		'email' => 'required',
            'uploadCv' => 'required|file|max:1024|mimes:doc,docx,pdf',
            'cover_letter' => 'required'
        ]);

        $fileInfo = $this->uploadFile($request,"uploadCv");
        $coverletter = $request->cover_letter;
        
        $UserArr = [];

        $UserArr['civility'] = $request->civility;
        $UserArr['name'] = $request->first_name;
        $UserArr['last_name'] = $request->last_name;
        $UserArr['email'] = $request->email;
        $UserArr['file_name'] = $fileInfo;
        $UserArr['cover_letter'] = $coverletter;


        $jobId = $request->id;
        $User = (object)$UserArr;

        $this->addCandidateInfoInZoho($request,$User,$jobId);
    }

    public function addCandidateInfoInZoho ($request,$User,$jobId)
    {
    	$token = env("ZOHO_ACCESS_TOKEN");

    	$fileInfo = $User->file_name;
        // $updateUser = User::find($User->id);

        $insertXml = '<Candidates><row no="1"><FL val="First Name">'.$User->name.'</FL><FL val="Last Name">'.$User->last_name.'</FL><FL val="Email">'.$User->email.'</FL>
        <FL val="Additional Info">'.$User->cover_letter.'</FL></row></Candidates>';
        
        $finalXml = urlencode($insertXml);
        
        $insertUrl = "https://recruit.zoho.eu/recruit/private/json/Candidates/addRecords?authtoken=$token&scope=recruitapi&version=2&xmlData=$finalXml";

        $response = $this->request($insertUrl,"POST");

        $resArr = json_decode($response);
        
        $recordArr = [];

        foreach ($resArr->response->result->recorddetail->FL as $value) {
            $key = str_replace(' ','_',strtolower($value->val));
            $recordArr[$key] = $value->content;
        }

        // update cv
        $recruitId = $recordArr['id'];
        $file = public_path('storage/'.$fileInfo);
        $requestUrl = "https://recruit.zoho.eu/recruit/private/json/Candidates/uploadFile?authtoken=$token&scope=recruitapi&type=Resume&version=2";

        $req = $this->request($requestUrl,"FILE",array(),$recruitId,$file,"resume.pdf");
		$this->createCoverLetter($request,$recruitId);
        
		$this->applyJobInZoho($recruitId,$jobId);
    }

    public function createCoverLetter (Request $request,$recruitId)
    {
        $content = $request->cover_letter;
        $fileName = str_random(5).'_'.$request->id.'.txt';
        $uploadPath = storage_path('app/public/cover_letter'); 
        
        $filePath = $uploadPath.'/'.$fileName;
        
        if (! File::isDirectory($uploadPath)) {
            // Creating directory structure
            File::makeDirectory($uploadPath, 0775, true);
        }

        $fp = fopen($filePath, 'w');
        fwrite($fp, $content);
        fclose($fp);

        $token1 = env("ZOHO_ACCESS_TOKEN");
        $heading = urlencode("Cover Letter");
        
        $file = public_path('storage/app/public/cover_letter/'.$fileName);
        $requestUrl1 = "https://recruit.zoho.eu/recruit/private/json/Candidates/uploadFile?authtoken=$token1&scope=recruitapi&type=$heading&version=2";

        $this->request($requestUrl1,"FILE",array(),$recruitId,$filePath,"cover_letter.txt");

    }

    public function applyJobInZoho ($id,$jobId)
    {
    	$token2 = env("ZOHO_ACCESS_TOKEN");

        if(Auth::check()) {
            $User = User::findorFail($id);

            $candidateId = $User->zr_id;
        } else {
            $candidateId = $id;
        }
        

    	$applyUrl = "https://recruit.zoho.eu/recruit/private/json/Candidates/associateJobOpening?authtoken=$token2&scope=recruitapi&jobIds=$jobId&candidateIds=$candidateId&candidateStatus=Associated&comments=PlacedinJavaDevelopment";

    	$this->request($applyUrl,"POST");
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

    public function savedJobs ()
    {
        $token = env("ZOHO_ACCESS_TOKEN");

        $userId = Auth::user()->id;
        $candidateId = Auth::user()->zr_id;

        $jobsApplied = JobsApplied::where('user_id',$userId)->where('flag','saved')->get();

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

        return view('jobs.jobsSaved',['jobsAppArr'=>$jobArr]);
    }


    public function appliedJobs ()
    {
        $token = env("ZOHO_ACCESS_TOKEN");

        $userId = Auth::user()->id;
        $candidateId = Auth::user()->zr_id;

        $jobsApplied = JobsApplied::where('user_id',$userId)->where('flag','applied')->get();

        $j = 0;
        $jobArr = [];
        
        if(count($jobsApplied)>0) {
            foreach ($jobsApplied as $jobDataArr) {
                
                $recordId = $jobDataArr->id;

                $createdAt = $jobDataArr->created_at;
                
                $jobId = $jobDataArr->job_id;

                $getJobDetailUrl = "https://recruit.zoho.eu/recruit/private/json/JobOpenings/getRecordById?&authtoken=$token&scope=recruitapi&version=2&id=$jobId";

                $getJobDetail = $this->request($getJobDetailUrl,"GET");

                $getJobDetailArr = json_decode($getJobDetail);

                if(isset($getJobDetailArr->response->result)) {
                    
                    foreach ($getJobDetailArr->response->result->JobOpenings->row->FL as $value2) {
                        $key = str_replace(' ','_',strtolower($value2->val));
                        $jobArr[$j][$key] = $value2->content;
                        $jobArr[$j]['record_id'] = $recordId;
                        $jobArr[$j]['created_at'] = $createdAt;
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
