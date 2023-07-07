<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index(){
        $grades = Grade::latest()->get();
        return view('backend.manage-grade', compact('grades'));
    }

    public function store(Request $request){

        $grade = new Grade();
        $request->validate([
            'grade' => 'required'
        ]);
        $grade->grade = $request->grade;
        $grade->save();

        return redirect()->route('manage_grade')->with('success','អ្នកបានបញ្ជូលជោគជ័យ!');
    }

    public function edit($id){
        $grade_detail = Grade::where('id',$id)->get();
        return view('backend.edit-grade', compact('grade_detail'));
    }

    public function update(Request $request, $id){
        
        $grade = Grade::where('id',$id)->first();
        $request->validate([
            'grade' => 'required'
        ]);
        $grade->grade = $request->grade;
        $grade->update();

        return redirect()->route('manage_grade')->with('success','អ្នកបានបញ្ចូលជោគជ័យ!');
    }

    public function delete($id){
        $grade = Grade::where('id',$id)->first();
        $grade->delete();

        return redirect()->route('manage_grade')->with('success','អ្នកបានលុបជោគជ័យ!');
    }
}
