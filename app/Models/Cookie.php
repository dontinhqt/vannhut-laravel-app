<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cookie extends Model
{
    protected $table = 'cookies';

    protected $fillable = [
        'user_id',
        'ip',
        'user_agent',
        'cookie',
        'avatar',
        'website',
        'country',
        'status',
    ];
}
