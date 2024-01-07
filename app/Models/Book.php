<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'author_id', 'isbn', 'description'];

    public function user()
    {
        return $this->belongsToMany(User::class, 'book_user_collection', 'book_id', 'user_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
