<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribeEmail extends Model
{
    /** @use HasFactory<\Database\Factories\SubscribeEmailFactory> */
    use HasFactory;

    protected $fillable = [
        'email',
        'status',
    ];
}
