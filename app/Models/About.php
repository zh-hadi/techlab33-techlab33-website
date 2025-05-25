<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /** @use HasFactory<\Database\Factories\AboutFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'video_url',
        'image',
        'clients',
        'projects',
        'hoursofsupport',
        'workers',
        'skill_title',
        'testimonial_title'
    ];
}
