<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\User;
use Crypt;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\Middleware\ErrorBinder;

class AdminController extends Controller
{
    function login(Request $request){

        $rules = array(
            'email'            => 'required',
            'password'         => 'required|min:5|max:32',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('/admin/login')
                ->withErrors($validator)->withInput(Input::except('password'));;
        } else {
            $user = User::where('email', '=', Input::get('email'))->first();
            if($user){
                if($user->hasRole('superAdmin') || $user->hasRole('admin')){
                    $decryptedPass = Crypt::decrypt($user->password);
                    if(Input::get('password') == $decryptedPass){
                        Auth::login($user);
                        return Redirect::to('/admin/index');
                    }else{
                        return Redirect::to('/admin/login')->with('LoginError', 'Email or Password was wrong');
                    }
                }else{
                    return Redirect::to('/admin/login')->with('LoginError', 'You dont have permission to access this page.');
                }

            }else{
                return Redirect::to('/admin/login')->with('LoginError', 'Email or Password was wrong');
            }
        }
    }

    public function createAdmin(Request $request){
        $input = Input::all();

        $validator = Validator::make($input, array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ));
        if($validator->fails()){

            $messages = $validator->messages();
            return Redirect::to('admin/create-admin')
                ->withErrors($validator)->withInput(Input::except('password'));;
        }else{
            $username = Input::get('username');
            $password = Input::get('password');

            $user = new User;
            $user->first_name = Input::get('first_name');
            $user->middle_name = Input::get('middle_name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            $user->password = Crypt::encrypt((Input::get('password')));

            if(! $user->save()) {
                return Redirect::to('admin/create-admin');
            } else {
                $user->attachRole(2);
                return Redirect::to('admin/create-admin')->with('message', 'Admin Created! Username => '.Input::get('email').'. Password => '.$password);
            }
        }
    }


    public function logout(){
        Auth::logout();
        return Redirect::to('/admin/login');
    }


    public function prep(){
        $user = new User;
        $user->first_name = "Sakib";
        $user->middle_name = "";
        $user->last_name = "Hasan";
        $user->email = "ajobbalok22@gmail.com";
        $user->meter_number = "123456";
        $user->password = Crypt::encrypt('9134967');
        $user->save();

        $user = new User;
        $user->first_name = "Super";
        $user->middle_name = "";
        $user->last_name = "Admin";
        $user->email = "superadmin@plexus.com";
        $user->password = Crypt::encrypt('9134967');
        $user->save();

        if($user->save()) {
            $user->attachRole(1);
        }
    }
}
