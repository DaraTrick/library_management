<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use KhmerDateTime\KhmerDateTime;

class StudentController extends Controller
{
    public function index(){
        $students = Student::latest()->get();
        $courses = Course::latest()->get();
        $grades = Grade::all();
        $student_id_generator = IdGenerator::generate(['table' => 'students','field'=>'student_id', 'length' => 6, 'prefix' =>('S')]);

        return view('backend.add-new-student', compact('students','courses','student_id_generator','grades'));
    }

    public function display(){

        // $students = DB::table('students')
        //                     ->join('grades','students.grade_id','=','grades.id')
        //                     ->join('courses','students.course_id','=','courses.id')
        //                     ->select('students.*','grades.grade','courses.course')
        //                     ->latest()
        //                     ->get();
        $students = Student::with('rGrade')->with('rCourse')->latest()->get();
        foreach($students as $student){
            $student->stDOB = KhmerDateTime::parse($student->stDOB)->format("L");
        }

        return view('backend.all-students', compact('students'));
    }

    public function store(Request $request){
       $student = new Student;

       $request->validate([
            'student_first_name' => 'required',
            'student_last_name' => 'required',
            'student_dob' => 'required',
            'grade' => 'required',
            'student_course' => 'required',
            'student_phone' => 'required',
            'student_email' => 'required|email'
            // 'student_password' => 'required|password'
       ]);

       $student_id_generator = IdGenerator::generate(['table' => 'students','field'=>'student_id', 'length' => 6, 'prefix' =>('S')]);

       $student->student_id = $student_id_generator;

       $student->stfname = $request->student_first_name;
       $student->stlname = $request->student_last_name;
       $student->stDOB = $request->student_dob;
       $student->stgender = $request->student_gender;
       $student->grade_id = $request->grade;
       $student->course_id = $request->student_course;
       $student->stphone = $request->student_phone;
       $student->stemail = $request->student_email;
    //    $student->stpassword = $request->student_password;

       $student->save();

       return redirect()->route('add-new-student')->with('success','អ្នកបានបញ្ជូលជោគជ័យ');
    }

    public function delete($id){
        $student = Student::where('id',$id)->first();
        $student->delete();
        return redirect()->route('all_students')->with('success','អ្នកបានព្រាងទុកជោគជ័យ!');
    }
    public function edit($id){
        $student = Student::where('id',$id)->get();
        $courses = Course::latest()->get();
        $grades = Grade::all();
        return view('backend.edit-student', compact('student','courses','grades'));
    }

    public function update(Request $request, $id){
        $student = Student::where('id',$id)->first();
        $request->validate([
            'student_first_name' => 'required',
            'student_last_name' => 'required',
            'student_dob' => 'required|date',
            'grade' => 'required',
            'student_course' => 'required',
            'student_phone' => 'required',
            'student_email' => 'required|email',
            // 'student_password' => 'required'
        ]);

        $student->student_id =  $student->student_id;
        $student->stfname = $request->student_first_name;
        $student->stlname = $request->student_last_name;
        $student->stDOB = $request->student_dob;
        $student->stgender = $request->student_gender;
        $student->grade_id = $request->grade;
        $student->course_id = $request->student_course;
        $student->stphone = $request->student_phone;
        $student->stemail = $request->student_email;
        // $student->stpassword = $request->student_password;

        $student->update();
        return redirect()->route('all_students')->with('success','អ្នកបានធ្វើបច្ចប្បន្នភាពជោគជ័យ!');
    }

    public function trashed(){
        $trashed_students = Student::with('rCourse')->with('rGrade')->onlyTrashed()->latest()->get();
        return view('backend.trashed-students', compact('trashed_students'));
    }

    public function restore($id){
        Student::where('id',$id)->restore();
        return redirect()->route('trashed_students')->with('success','អ្នកបានស្តារជោគជ័យ!');
    }

    public function force_delete($id){
        Student::where('id',$id)->forceDelete();
        return redirect()->route('all_students')->with('success','អ្នកបានលុបជោគជ័យ!');
    }

    
}
