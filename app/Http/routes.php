<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Admin routes */

Route::get('admin/login',['as'=>'login',function(){
    if(\Dobby::isLoggedIn())
    {
        Debugbar::addMessage('redirect to admin');
        return redirect('admin');
    }
    return view('admin.login');
}]);

Route::post('admin/login',array('as'=>'login','uses'=>'Admin\LoginController@login'));

Route::get('admin/logout',function(){
    Dobby::logout();
    return redirect('admin');
});

Route::group(['middleware'=>'auth.dobby','prefix'=>'admin'],function() {
    Route::get('/', ['as' => 'admin', function () {
        return view('admin.home');
    }]);
});