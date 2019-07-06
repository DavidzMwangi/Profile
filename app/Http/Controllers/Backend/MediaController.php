<?php

namespace App\Http\Controllers\Backend;

use App\Models\Media;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    public function __invoke()
    {
        return view('backend.media')->withMedias(Media::all());
    }

    public function saveNewMedia(Request $request)
    {
        $media=new Media();
        $media->name=$request->name;
        $media->description=$request->description;
        $media->link=$request->link;



        if($request->hasFile('user_pic')) {
            if (!$request->file('user_pic')->isValid()) {
                return redirect()->back()->withErrors(['error'=>'The picture is invalid']);
            } else {
                //save picture
                $image=Input::file('user_pic');
                $filename=time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('uploads/media/');
                if(!File::exists($path)) {File::makeDirectory($path, $mode = 0777, true, true);}
                Image::make($image->getRealPath())->fit(500,500)->save($path . $filename);

                $media->picture=$filename;
                $media->Save();
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
              $table->text('picture')->nullable();
    }

    public function deleteMedia(Media $media)
    {
        $media->delete();

        return redirect()->back();
    }
}
