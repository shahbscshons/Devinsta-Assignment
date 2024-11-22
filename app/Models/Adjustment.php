<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    use HasFactory;

   /* protected $fillable = ['type', 'value', 'date']; // Define the fields that are mass assignable*/
   protected $fillable = [
    'seed_input_date',
    'seed_input_calendar',
    'seed_response_date',
    'seed_response_calendar',
    'insta-visitor-adjustment',
    'insta-visitor-calendarr',
    'facebook-visitor-adjustment',
    'facebook-visitor-calendar',
    'site-session-total-adjustment',
    'site-session-calendar',
    'site-engagement-adjustment',
    'site-engagement-calendar',
    'site-device-iphone-adjustment',
    'site-device-iphone-calendar',
    'site-device-android-adjustment',
    'site-device-android-calendar',
    'site-pc-adjustment',
    'site-pc-calendar',
    // Add other fields here
    ];
}