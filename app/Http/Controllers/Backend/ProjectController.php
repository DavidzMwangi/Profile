<?php

namespace App\Http\Controllers\Backend;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    //  $table->string('name');
    //            $table->text('description');
    //            $table->date('start_date');
    //            $table->date('end_date');
    //            $table->text('picture');
    //            $table->unsignedBigInteger('skill_id');
    //            $table->string('client_name')->nullable();
    //            $table->string('client_description')->nullable();
    //            $table->string('language');
    //            $table->string('category');

    public function __invoke()
    {
        return view('backend.project')->withProjects(Project::all())->withSkills(Skill::all());
    }

    public function saveNewProject(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'picture'=>'required',
            'skill_id'=>'required',
            'client_name'=>'required',
            'client_description'=>'required',
            'language'=>'required',
            'category'=>'required'
        ]);



        $project=new Project();

        $project->name=$request->name;
        $project->description=$request->description;
        $project->start_date=$request->start_date;
        $project->end_date=$request->end_date;
        $project->skill_id=$request->skill_id;
        $project->client_name=$request->client_name;
        $project->client_description=$request->client_description;
        $project->language=$request->language;
        $project->category=$request->category;

        if($request->hasFile('picture')) {
            if (!$request->file('picture')->isValid()) {
                return redirect()->back()->withErrors(['error'=>'The picture is invalid']);
            } else {
                //save picture
                $image=Input::file('picture');
                $filename=time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('uploads/project/');
                if(!File::exists($path)) {File::makeDirectory($path, $mode = 0777, true, true);}
                Image::make($image->getRealPath())->fit(500,500)->save($path . $filename);

                $project->picture=$filename;
                $project->Save();
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function deleteProject(Project $project)
    {
        try{
            $project->delete();
        }catch (\Exception $e){

        }

        return redirect()->back();
    }
}
