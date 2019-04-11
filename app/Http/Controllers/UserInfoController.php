<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Traits\FileUploadsTrait;
use App\Repositories\Traits\FileDeletesTrait;

use DB;
use App\User;

use Auth;

use App\Http\Requests\UserInfoRequest;

class UserInfoController extends Controller
{
    use FileUploadsTrait;
    use FileDeletesTrait;

    public function uploadCv () 
    {
        return view('userInfoPage.uploadCv');
    }

    public function saveCv (Request $request)
    {
        $request->validate([
            'uploadCv' => 'required|file|max:1024|mimes:doc,docx,pdf',
        ]);

        $fileInfo = $this->uploadFile($request,"uploadCv");
        
        $id = Auth::user()->id;
        
        $User = User::findorFail($id);

        $User->file_name = $fileInfo;

        $User->save();

        return redirect()->route('step1');

    }

    public function step1 () 
    {
        $id = Auth::user()->id;
        $userInfo = User::find($id);
        
    	return view('userInfoPage.step1', ['data'=>$userInfo]);
    }

    public function step1Update(UserInfoRequest $request)
    {
        $id = Auth::user()->id;
        
        $User = User::findorFail($id);
        
        $User->civility = $request->civility;
        $User->last_name = $request->last_name;
        $User->name = $request->first_name;
        $User->birth_date = $request->birth_date;
        $User->code_postal = $request->code_postal;
        $User->city = $request->city;
        $User->pays = $request->pays;
        $User->telephone = $request->telephone;
        $User->contract_desired = !empty($request->contract_desired)?implode(",",$request->contract_desired):'';
        $User->position_wishes_1 = $request->position_wishes_1;
        $User->position_wishes_2 = $request->position_wishes_2;
        $User->annual_salary = $request->annual_salary;
        $User->availability = $request->availability;
        $User->mobility = $request->mobility;
        $User->email_notification = $request->email_notification;

        $User->save();

        return redirect()->route('step2')->with('status', "User info updated successfully");
    }

    public function step2 () 
    {
        $id = Auth::user()->id;
        $userInfo = User::find($id);
        
        return view('userInfoPage.step2', ['data'=>$userInfo]);
    }

    public function step2Update (Request $request)
    {
        $id = Auth::user()->id;
        
        $User = User::findorFail($id);

        $lph_from = $request->lph_From_yr."-".$request->lph_From_mo."-01";
        $lph_to = $request->lph_To_yr."-".$request->lph_To_mo."-01";

        $User->experience = $request->experience;
        $User->lph_From = $lph_from;
        $User->lph_To = $lph_to;
        $User->still_in_office = $request->still_in_office;
        $User->job_title = $request->job_title;
        $User->fonction = $request->fonction;
        $User->gross_annual_salary = $request->gross_annual_salary;
        $User->assignments = $request->assignments;
        $User->level_of_education = $request->level_of_education;
        $User->training_type = $request->training_type;
        $User->lang_11 = $request->lang_11;
        $User->lang_12 = $request->lang_12;
        $User->lang_21 = $request->lang_21;
        $User->lang_22 = $request->lang_22;

        $User->save();
    }
}
