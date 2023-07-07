<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CourseController extends Controller
{
    public function index(){
        $code_course_generator = IdGenerator::generate(['table' => 'courses','field'=>'code_course', 'length' => 5, 'prefix' =>date('C')]);
        $courses = Course::latest()->get();
        return view('backend.courses', compact('courses', 'code_course_generator'));
    }
    public function store(Request $request){

        $course = new Course();

        $code_course_generator = IdGenerator::generate(['table' => 'courses','field'=>'code_course', 'length' => 5, 'prefix' =>date('C')]);

        if(empty($request->course))
        {
            return redirect()->route('courses')->with('error','សូមបញ្ជូលមុខវិជ្ជា');
        }

        $course->code_course = $code_course_generator;
        $course->course = $request->course;
        $course->save(); 

        return redirect()->route('courses')->with('success','អ្នកបានបញ្ជូលជោគជ័យ');
    }

    public function edit($id){
        $course_detail = Course::where('id', $id)->get();
        return view('backend.edit-course', compact('course_detail'));
    }

    public function update(Request $request, $id){
        $course = Course::where('id',$id)->first();

        if(empty($request->course))
        {
            return redirect()->route('courses')->with('error','សូមបញ្ជូលមុខវិជ្ជា');
        }

        $course->code_course = $course->code_course;

        $course->course = $request->course;
        $course->update();

        return redirect()->route('courses')->with('success','អ្នកបានធ្វើបច្ចប្បន្នភាពជោគជ័យ');

    }

    public function delete($id){
        $course = Course::where('id',$id)->first();
        $course->delete();

        return redirect()->route('courses')->with('success','អ្នកបានលុបជោគជ័យ');
    }
}
