<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstaAdjustment extends Model
{
    use HasFactory;

// Define the table name if it's different from the default plural form
protected $table = 'insta_adjustments';

    protected $fillable = ['field_name', 'value', 'date'];
}
