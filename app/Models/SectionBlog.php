<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionBlog extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title', 
        'description', 
        'blog_id'
    ];
    public function blogs(){
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
