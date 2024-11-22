<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'insta_visitor',
        'facebook_visitor',
        'site_session',
        'site_engagement',
        'device_iphone',
        'device_android',
        'device_pc',
    ];
}
