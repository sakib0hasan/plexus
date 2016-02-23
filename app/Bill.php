<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'bill_no', 'due_date', 'month', 'amount', 'total_unit', 'user_id', 'status'
    ];

    protected $table = 'bills';
}
