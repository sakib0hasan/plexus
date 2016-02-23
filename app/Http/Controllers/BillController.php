<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Serial;
use App\Meter;
use App\Readings;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class BillController extends Controller
{
    function generateAllBills(){
        //SELECT * FROM readings WHERE created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY created_at DESC
        //$bill = DB::select("SELECT * FROM readings WHERE created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY created_at DESC");
        $serials = DB::select("SELECT DISTINCT(serial) FROM readings WHERE created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY created_at DESC");
        //
        foreach($serials as $serial){
            $readings = DB::select("SELECT * FROM readings WHERE ((serial = ".$serial->serial.") AND (created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH)))");
            //var_dump($readings);
            $firstReading = $readings[0]->unit;
            $lastReading = $readings[sizeof($readings)-1]->unit;
            $totalUnit = $lastReading - $firstReading;

            $serial_id = Serial::where('serial','=',$serial->serial)->get();
            $serial_id = $serial_id[0]->id;
            $owner = Meter::where('serial_id','=', $serial_id)->get();
            //echo $owner[0]->owner_id;


            $createBill = new Bill;
            $createBill->month = date('M');
            $createBill->amount = $totalUnit*3;
            $createBill->total_unit = $totalUnit;
            $createBill->user_id = $owner[0]->owner_id;

            $createBill->save();

            //echo $serial->serial.">".$totalUnit;
        }
        return redirect('/dashboard');
    }


    function readReadingFromRPi(Request $request){
        $rules = array(
            'meter_id' => 'required',
            'unit' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        //return Input::all();

        if ($validator->fails()) {
            return $messages = $validator->messages();
        } else {
            $check = Serial::where('serial', '=', Input::get('meter_id'))->first();
            if ($check) {
                $reading = new Readings;
                $reading->serial = Input::get('meter_id');
                $reading->unit = Input::get('unit');
                $reading->save();
                return "DONE";
            }else{
                return "ERROR";
            }
        }

    }
}
