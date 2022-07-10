<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'publised',
        'status',
    ];
    public function books_outs()
    {
        return $this->hasMany(Books_out::class);
    }

    // public function books_outs()
    // {
    //     return $this->belongsTo(Books_out::class);
    // }
}
