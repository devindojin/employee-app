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

	public function notifications ()
	{
		$notifications = Notification::get();

		return view('pages.notificationList', ['data'=>$notifications]);
	}

	public function notification ()
	{
		$locals = Local::get();

		return view('pages.notification',['locals'=>$locals]);
	}

	public function editNotification (Request $request)
	{
		$id = $request->id;

		$locals = Local::get();

		$notifications = Notification::findorfail($id)->load('locals');
		
		return view('pages.editNotification',['locals'=>$locals, 'data' => $notifications]);
	}

	public function saveNotification (Request $request)
	{
		$id = $request->id;

		if($id != "") {
			$notification  = Notification::find($id);
		} else {
			$notification  = new Notification;
		}

		$notification->title = $request->poste_title;

		if (isset($request->contract_type) && count($request->contract_type) > 1) {
			$notification->type = implode(',',$request->contract_type);
		} else {
			$notification->type = $request->contract_type;
		}

		$notification->save();
		$notification->locals()->sync($request->local);

		return redirect()->route('notifications');
	}

	public function deleteNotification(Request $request)
    {
    	$id = $request->id;

    	$notification = Notification::find($id);
		$notification->delete();

		$notification->locals()->detach();

		return back();
    }
}
