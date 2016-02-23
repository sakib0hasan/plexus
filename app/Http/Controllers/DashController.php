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

class DashController extends Controller{
    function queryPost(Request $request){
        return Input::all();
    }
}
