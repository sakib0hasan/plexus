<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['description', 'bill_no'];

    public function bill()
    {
        return $this->belongsTo('App\Bill');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
