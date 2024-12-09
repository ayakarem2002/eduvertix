<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
    
        'icon_1',  // Icon for the course
        'title_1', // Title of the course
        'desc_1',  // Description of the course
    ];
}
