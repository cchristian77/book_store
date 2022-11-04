<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'authors';

    protected $fillable = [
        'name',
        'email',
        'gender',
        'address',
        'place_of_birth',
        'date_of_birth',
        'nationality',
        'profile_picture_url',
        'about',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_authors', 'author_id', 'book_id');
    }

}
