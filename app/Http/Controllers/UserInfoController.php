<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;

use Auth;

use App\Http\Requests\UserInfoRequest;

class UserInfoController extends Controller
{
    public function userInfoPage () 
    {
    	return view('userInfoPage.step1', ['data'=>"testing value"]);
    }

    public function saveUpdate(UserInfoRequest $request)
    {
        $id = Auth::user()->id;
        
        $User = User::findorFail($id);
        
        $User->civility = $request->civility;
        $User->last_name = $request->last_name;
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

        // return redirect('administrator/body-parts')->with('status', "User info updated successfully");
    }
}
