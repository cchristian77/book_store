<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookGenre extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'book_genres';

    protected $fillable = [
        'book_id',
        'genre_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
