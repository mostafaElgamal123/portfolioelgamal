<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'location', 
        'email', 
        'phone',
        'open_hours',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
    ];
}
