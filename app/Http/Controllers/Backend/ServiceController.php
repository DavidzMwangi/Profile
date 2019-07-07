<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function __invoke()
    {
        return view('backend.service')->withServices(Service::all());
    }

    public function saveNewService(Request $request)
    {
        $service=new Service();
        $service->name=$request->name;
        $service->description=$request->description;
        if($request->hasFile('user_pic')) {
            if (!$request->file('user_pic')->isValid()) {
                return redirect()->back()->withErrors(['error'=>'The picture is invalid']);
            } else {
                //save picture
                $image=Input::file('user_pic');
                $filename=time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('uploads/service/');
                if(!File::exists($path)) {File::makeDirectory($path, $mode = 0777, true, true);}
                Image::make($image->getRealPath())->fit(500,500)->save($path . $filename);

                $service->icon=$filename;
                $service->Save();
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function deleteService(Service $service)
    {
        $service->delete();

        return redirect()->back();
    }

}
