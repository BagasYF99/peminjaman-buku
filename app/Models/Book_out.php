<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_out extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'user_id',
        'date_out',
        'date_in',
        'date_in_actual',
    ];
}
