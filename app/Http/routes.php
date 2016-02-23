<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::post('/postData', "BillController@readReadingFromRPi");


Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/login', function () {
        return view('login');
    });
    Route::post('/login', "LoginController@login");

    Route::get('/register', function () {
        return view('register');
    });
    Route::post('/register', "LoginController@register");






    Route::group(['prefix' => 'admin'], function () {
        //login
        Route::get('/login', function() {
            return view('admin.login');
        });
        Route::post('/login', "AdminController@login");
    });



    Route::group(['middleware' => 'auth'], function () {
        //Dashboard Routes
        Route::get('/dashboard', function(){
            return view('dashboard.index');
        });

        Route::get('/comment/{id}', "CommentController@form");
        Route::post('/comment/{id}', "CommentController@postComment");



        Route::group(['prefix' => 'admin'], function () {
            // Admin Index
            Route::get('/index', function(){
                return view('admin.index');
            });

            Route::get('/create-admin', function(){
                return view('admin.createAdmin');
            });
            Route::post('/create-admin', "AdminController@createAdmin");

            Route::get('/logout', "AdminController@logout");
        });



        Route::get('/logout', "LoginController@logout");
        Route::get('/genBill', "BillController@generateAllBills");

        Route::get('/general-query', function(){
            return view('dashboard.general-query');
        });
        Route::post('/general-query', "DashController@queryPost");
    });


    Route::get('/prep', "AdminController@prep");

});
