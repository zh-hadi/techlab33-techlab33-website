<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory;

    protected $fillable = [
        'website_name',
        'website_email',
        'website_logo',
        'website_favicon',
        'address',
        'phone',
        'telephone',
        'hotline_number',
        'facebook_link',
        'linkedin_link',
        'x_link',
        'instagram_link',
        'google_map_location',
    ];
}
