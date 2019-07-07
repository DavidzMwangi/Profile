<?php

namespace App\Http\Controllers\Backend;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    //$table->string('name');
    //                        $table->string('location');
    //                        $table->string('education');
    //                        $table->string('acquired_grade');

    public function __invoke()
    {
        return view('backend.education')->withEducations(Education::all());
    }

    public function saveNewEducation(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'location'=>'required',
            'education'=>'required',
            'acquired_grade'=>'required'
        ]);


        $education=new Education();
        $education->name=$request->name;
        $education->location=$request->location;
        $education->education=$request->education;
        $education->acquired_grade=$request->acquired_grade;
        $education->save();


        return redirect()->back();
    }

    public function deleteEducation(Education $education)
    {
        $education->delete();

        return redirect()->back();
    }
}
