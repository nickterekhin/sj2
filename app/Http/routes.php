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

Route::get('admin/logout',['as'=>'logout',function(){
    Dobby::logout();
    return redirect('admin');
}]);

Route::get('logout',function(){
    Dobby::logout();
    return redirect('/');
});

Route::group(['middleware'=>'auth.dobby','prefix'=>'admin'],function() {
    Route::get('/', ['as' => 'admin', function () {
        return view('admin.home');
    }]);
    //---------------------Users------------------------------
    Route::get('users', array('as'=>'users', 'uses'=>'Admin\UsersController@index'));
    Route::get('users/create', array('as'=>'users.create', 'uses'=>'Admin\UsersController@create'));
    Route::post('users/create', array('as'=>'users.create', 'uses'=>'Admin\UsersController@store'));
    Route::get('users/edit/{id}', array('as'=>'users.edit', 'uses'=>'Admin\UsersController@edit'));
    Route::post('users/edit/{id}', array('as'=>'users.edit', 'uses'=>'Admin\UsersController@update'));
    Route::get('users/delete/{id}', array('as'=>'users.delete', 'uses'=>'Admin\UsersController@delete'));
    Route::get('users/{active}/{id}', array('as'=>'users.activate', 'uses'=>'Admin\UsersController@openClose'));
    //-------------------------------------------------------

    //------------------User Groups -------------------------
    Route::get('user-groups', array('as'=>'user-groups', 'uses'=>'Admin\UserGroupsController@index'));
    Route::get('user-groups/create', array('as'=>'user-groups.create', 'uses'=>'Admin\UserGroupsController@create'));
    Route::post('user-groups/create', array('as'=>'user-groups.create', 'uses'=>'Admin\UserGroupsController@store'));
    Route::get('user-groups/edit/{id}', array('as'=>'user-groups.edit', 'uses'=>'Admin\UserGroupsController@edit'));
    Route::post('user-groups/edit/{id}', array('as'=>'user-groups.edit', 'uses'=>'Admin\UserGroupsController@update'));
    Route::get('user-groups/delete/{id}', array('as'=>'user-groups.delete', 'uses'=>'Admin\UserGroupsController@destroy'));
    Route::get('user-groups/{active}/{id}', array('as'=>'user-groups.activate', 'uses'=>'Admin\UserGroupsController@openClose'));
    //----------------------------------------------------------
    Route::get('news-tags', array('as'=>'news-tags', 'uses'=>'Admin\TagsController@index'));

});