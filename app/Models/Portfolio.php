<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title', 
        'description', 
        'project_url',
        'image',
        'status',
        'category_id',
        'client_id'
    ];
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function clients(){
        return $this->belongsTo(Client::class,'client_id');
    }
}
