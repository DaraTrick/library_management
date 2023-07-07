<?php

namespace App\Models;

use App\Http\Controllers\CourseController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function rCourse(){
        return $this->belongsTo(Course::class,'course_id');
    }

    public function rGrade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
}
