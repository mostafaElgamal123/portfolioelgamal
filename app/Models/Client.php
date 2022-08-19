<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'image',
        'status'
    ];
    public function portfolios(){
        return $this->belongsTo(Portfolio::class);
    }
}
