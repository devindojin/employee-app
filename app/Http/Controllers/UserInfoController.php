<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function userInfoPage () 
    {
    	return view('userInfoPage.step1', ['data'=>"testing value"]);
    }
}
