<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title', 
        'description_left', 
        'description_right',
        'image_left', 
        'image_right',
        'video'
    ];
}
