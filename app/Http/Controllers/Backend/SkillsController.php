<?php

namespace App\Http\Controllers\Backend;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class SkillsController extends Controller
{
    public function __invoke()
    {
        return view('backend.skills')->withSkills(Skill::all());
    }

    public function saveNewSkill(Request $request)
    {


        $skill=new Skill();
        $skill->name=$request->name;
        $skill->description=$request->description;
        $skill->level=$request->level;
        $skill->experience_yrs=$request->experience_yrs;
        $skill->start_date=$request->start_date;

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

                $skill->picture=$filename;
                $skill->Save();
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function deleteSkill(Skill $skill)
    {
        $skill->delete();


        return redirect()->back();
    }
}
