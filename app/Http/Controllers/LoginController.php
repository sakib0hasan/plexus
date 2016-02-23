<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Meter;
use App\Serial;
use Crypt;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\Middleware\ErrorBinder;

class LoginController extends Controller{
    function register(Request $request){

        $rules = array(
            'first_name'       => 'required',
            'middle_name'      => '',
            'last_name'        => 'required',
            'email'            => 'required|unique:users,email',
            'meter_serial'     => 'required',
            'password'         => 'required|min:5|max:32',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();

            return Redirect::to('/register')
                ->withErrors($validator)->withInput(Input::except('password'));;
        } else {


            $check = Serial::where('serial', '=', Input::get('meter_serial'))->first();
            if($check){
                $user = new User;

                //$meter->meter_number = Input::get('meter_serial');
                $user->first_name     = Input::get('first_name');
                $user->last_name    = Input::get('last_name');
                $user->middle_name = Input::get('middle_name');
                $user->email = Input::get('email');
                //$user->meter_number = Input::get('meter_serial');
                $user->password  = Crypt::encrypt(Input::get('password'));

                $user->save();

                $meter = new Meter();
                $meter->serial_id = $check->id;
                $meter->owner_id = $user->id;
                $meter->save();

                return Redirect::to('/login')->with('RegisterSuccess', 'Registration Successful. Please Login.');
            }else{
                return Redirect::to('/register')
                    ->withErrors($validator)->withInput(Input::except('password'))->with('serialError', 'Meter serial not found on database');
            }

        }
    }


    function login(Request $request){

        $rules = array(
            'email'            => 'required',
            'password'         => 'required|min:5|max:32',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();

            return Redirect::to('/login')
                ->withErrors($validator)->withInput(Input::except('password'));;
        } else {
//            $user = new User;
//            $user->first_name     = Input::get('first_name');
//            $user->last_name    = Input::get('last_name');
//            $user->middle_name = Input::get('middle_name');
//            $user->email = Input::get('email');
//            $user->meter_number = Input::get('meter_serial');
//            $user->password  = Crypt::encrypt(Input::get('password'));
//
//            $user->save();
            //$password = Crypt::encrypt(Input::get('password'));

            //return $password;
//            if (Auth::attempt(['email' => Input::get('email'), 'password' => $password]))
//            {
//                return "success";
//                //return redirect()->intended('dashboard');
//            }else{
//                return "failed";
//            }

            $user = User::where('email', '=', Input::get('email'))->first();
            if($user){
                $decryptedPass = Crypt::decrypt($user->password);
                if(Input::get('password') == $decryptedPass){
                    Auth::login($user);
                    return Redirect::to('/dashboard');
                }else{
                    return Redirect::to('/login')->with('LoginError', 'Email or Password was wrong');
                }
            }else{
                return Redirect::to('/login')->with('LoginError', 'Email or Password was wrong');
            }
        }

    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/login');
    }


}
