<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'report_date',
        'temperature',
        'wind_speed',
        'humidity',
        'condition_icon',
        'condition_text',
    ];

}
