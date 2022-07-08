<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Traits\FileUploadsTrait;
use App\Repositories\Traits\FileDeletesTrait;
use App\Repositories\Traits\CurlRequestTrait;
use Illuminate\Support\Facades\Hash;

use DB;
use App\User;

use Auth;

use App\Http\Requests\UserInfoRequest;
use App\Http\Requests\UserInfoRequest2;

class UserInfoController extends Controller
{
    use FileUploadsTrait;
    use FileDeletesTrait;
    use CurlRequestTrait;

    public function uploadCv () 
    {
        $token = env("ZOHO_ACCESS_TOKEN");

        $id = Auth::user()->id;
        
        $User = User::findorFail($id);

        $insertXml = '<Candidates><row no="1"><FL val="First Name">Temp FN</FL><FL val="Last Name">Temp LN</FL><FL val="Email">'.$User->email.'</FL></row></Candidates>';
        
        $finalXml = urlencode($insertXml);
        
        $insertUrl = "https://recruit.zoho.eu/recruit/private/json/Candidates/addRecords?authtoken=$token&scope=recruitapi&version=2&xmlData=$finalXml";

        $response = $this->request($insertUrl,"POST");

        $resArr = json_decode($response);
        
        $recordArr = [];

        foreach ($resArr->response->result->recorddetail->FL as $value) {
            $key = str_replace(' ','_',strtolower($value->val));
            $recordArr[$key] = $value->content;
        }

        $User->zr_id = $recordArr['id'];

        $User->save();
        
        return redirect()->route('moncv');
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

        // upload cv in zoho recruit
        $token = env("ZOHO_ACCESS_TOKEN");
        $recruitId = $User->zr_id;
        $file = public_path('storage/'.$fileInfo);
        $requestUrl = "https://recruit.zoho.eu/recruit/private/json/Candidates/uploadFile?authtoken=$token&scope=recruitapi&type=Resume&version=2";

        $req = $this->request($requestUrl,"FILE",array(),$recruitId,$file,"resume.pdf");
        
        return redirect()->route('moncv')->with('status', 'Votre CV a bien été mis à jour');

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
        $User->code_postal = $request->code_postal;
        $User->city = $request->city;
        $User->telephone = $request->telephone;

        $User->save();


        // update record in zoho recruit
        $token = env("ZOHO_ACCESS_TOKEN");
        $recordId = $User->zr_id;
        $updateXml = '<Candidates><row no="1"><FL val="First Name">'.$request->first_name.'</FL><FL val="Last Name">'.$request->last_name.'</FL><FL val="Mobile">'.$request->telephone.'</FL><FL val="Zip Code">'.$request->code_postal.'</FL><FL val="city">'.$request->city.'</FL><FL val="Salutation">'.$request->civility.'</FL></row></Candidates>';
        $finalXml = urlencode($updateXml);

        $updateUrl = "https://recruit.zoho.eu/recruit/private/xml/Candidates/updateRecords?newFormat=1&authtoken=$token&scope=recruitapi&xmlData=$finalXml&id=$recordId&version=2";
        $res = $this->request($updateUrl,"POST");
        
        return redirect()->route('moncv')->with('status', 'Informations de profil mises à jour avec succès');
    }

    public function updatePassword ()
    {
        return view('auth.passwords.update');
    }

    public function savePassword (Request $request)
    {
        $userId = Auth::user()->id;

        $user = User::find($userId);

        $user->password = Hash::make($request->pass);

        $user->save();

        return redirect()->back();
    }
}
