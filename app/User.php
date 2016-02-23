<?php

namespace App;

use Zizaco\Entrust\Traits\EntrustUserTrait;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'emiddle_namemail', 'last_name', 'email', 'password'
    ];

    public function meter() {
        return $this->hasOne('Meter');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function showReadings($user){
        $meters = Meter::where('owner_id','=', $user->id)->get();
        foreach($meters as $meter){
            //echo $meter->serial->serial;
            return Readings::where('serial','=', $meter->serial->serial)->orderBy('created_at', 'desc')->take(10)->get();
        }
    }

    public function showBills($user){
        $bills = Bill::where('user_id','=', $user->id)->get();
        return $bills;
    }
}
