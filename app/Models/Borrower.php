<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Student;
use App\Models\User;
use App\Models\BorrowerBook;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrower extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'borrower_id',
        'student_id',
        'staff_id',
        'student_NOcopies',
        'releaseDate',
        'dueDate'
    ];

    public function rBook(){
        return $this->belongsTo(Book::class,'book_id');
    }

    public function rStudent(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function rUser(){
        return $this->belongsTo(User::class,'staff_id');
    }

}
