<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Traits\CurlRequestTrait;

use DB;
use App\User;

use Auth;

class JobController extends Controller
{
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
    	
    	// echo "<pre>";
    	// print_r($jobsArr);
    	// echo "</pre>";
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

    	// echo "<pre>";
    	// print_r($jobArr);
    	// echo "</pre>";

    }

    public function applyJob (Request $request) 
    {
    	$token = env("ZOHO_ACCESS_TOKEN");

    	$id = Auth::user()->id;
        
        $User = User::findorFail($id);

        $candidateId = $User->zr_id;

    	$jobId = $request->id;

    	$applyUrl = "https://recruit.zoho.com/recruit/private/json/Candidates/changeStatus?authtoken=$token&scope=recruitapi&jobId=$jobId&candidateIds=$candidateId&candidateStatus=Associated&comments=PlacedinJavaDevelopment";

    	$res = $this->request($applyUrl,"POST");

    	$resArr = json_decode($res);
    	
    	$recordArr = [];

        foreach ($resArr->response->result->recorddetail->FL as $value) {
            $key = str_replace(' ','_',strtolower($value->val));
            $recordArr[$key] = $value->content;
        }

        // echo "<pre>";
        // print_r($recordArr);
    }
}
