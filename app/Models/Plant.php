<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'name',
        'latin_name',
        'description',
        'care_instructions',
        'watering_frequency',
        'light_requirement',
        'humidity_requirement',
        'difficulty',
    ];
}
