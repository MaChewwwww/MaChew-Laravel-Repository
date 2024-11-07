<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{

    protected $fillable = [
        'name',
        'academic_year',
        'description'
    ];

}
