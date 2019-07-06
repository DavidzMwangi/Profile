<?php

namespace App\Http\Controllers\Backend;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __invoke()
    {
        return view('backend.profile');
    }

    public function updateUser1(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'email_2'=>'required',
            'phone'=>'required',
            'phone_2'=>'required',

        ]);

        $user=Auth::user();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->email_2=$request->email_2;
        $user->phone=$request->phone;
        $user->phone_2=$request->phone_2;
        $user->save();

        return redirect()->back();
    }

    public function updateUserPicture(Request $request)
    {

        $user=Auth::user();
        if($request->hasFile('user_pic')) {
            if (!$request->file('user_pic')->isValid()) {
                return redirect()->back()->withErrors(['error'=>'The picture is invalid']);
            } else {
                //save picture
                $image=Input::file('user_pic');
                $filename=time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('uploads/profile/');
                if(!File::exists($path)) {File::makeDirectory($path, $mode = 0777, true, true);}
                Image::make($image->getRealPath())->fit(500,500)->save($path . $filename);
                try{
                    if ($user->picture!='user.jpg')
                        File::Delete($path . $user->picture);
                }catch (Exception $h){
                }
                $user->picture=$filename;
                $user->Save();
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function updateUser2(Request $request)
    {
        $this->validate($request,[
            'completed_works'=>'required',
            'completed_years'=>'required',
            'no_of_clients'=>'required',
            'profile_description'=>'required',

        ]);

        $user=Auth::user();
        $user->completed_works=$request->completed_works;
        $user->completed_years=$request->completed_years;
        $user->clients=$request->no_of_clients;
        $user->profile_description=$request->profile_description;
        $user->save();

        return redirect()->back();
    }
}
