<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'image_1', 'image_2', 'video_1', 
        'numbers', 'icon_1', 'desc_1', 'video_2', 'title_2', 'desc_2'
    ];
    
}
