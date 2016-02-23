<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Readings extends Model
{
    protected $fillable = [
        'serial', 'unit'
    ];

    protected $table = 'readings';
}
