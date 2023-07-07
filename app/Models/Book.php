<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function rBookAuthor(){
        return $this->belongsTo(BookAuthor::class,'book_author_id');
    }

    public function rBookCategory(){
        return $this->belongsTo(BookCategory::class,'book_category_id');
    }
}
