<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name'
    ];
    public function portfolios(){
        return $this->hasMany(Portfolio::class,'category_id');
    }
    public function blogs(){
        return $this->hasMany(Blog::class,'category_id');
    }
}
