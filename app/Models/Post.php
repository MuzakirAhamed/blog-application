<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'date', 'author', 'content', 'blog_image', 'status'];

    public function authorName()
    {
        return $this->belongsTo(User::class,'author');
    }
}
