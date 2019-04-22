<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;
use App\Local;
use App\Notification;

use Auth;

class PageController extends Controller
{
    public function monCv ()
    {
    	$id = Auth::user()->id;
        $userInfo = User::find($id);

    	return view('pages.moncv',["data"=>$userInfo]);
    }

    public function getDownload()
	{
		$id = Auth::user()->id;
        $userInfo = User::find($id);

	    $file= public_path('storage/'.$userInfo->file_name);
	    $fileName = strtolower($userInfo->name).'_'.strtolower($userInfo->last_name).'_cv.pdf';
	    $headers = array(
	              'Content-Type: application/pdf',
	            );

	    return response()->download($file, $fileName, $headers);
	}

	public function notification ()
	{
		$locals = Local::get();

		return view('pages.notification',['locals'=>$locals]);
	}

	public function saveNotification (Request $request)
	{
		$notification  = new Notification;

		$notification->title = $request->poste_title;
		$notification->type = implode(',',$request->contract_type);

		$notification->save();
		$notification->locals()->sync($request->local);
	}
}
