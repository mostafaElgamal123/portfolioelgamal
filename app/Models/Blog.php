<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
        'status',
        'category_id',
        'user_id'
    ];
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function sectionblogs(){
        return $this->hasMany(SectionBlog::class,'blog_id');
    }
}
