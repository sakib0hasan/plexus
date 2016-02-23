<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model{
    protected $fillable = [
        'owner_id', 'serial_id'
    ];

    public function owner() {
        return $this->belongsTo('App\User');
    }

    public function serial() {
        return $this->belongsTo('App\Serial');
    }

    protected $table = 'meters';
}
