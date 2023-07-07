<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowerBook extends Model
{
    use HasFactory;

    public function borrowers(){
        return $this->belongsTo(Borrower::class);
    }
}
