<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function login()
    {

        $credential = array(
            'password'=>\Input::get('password'),
            'login'=>\Input::get('email')

        );

        \Debugbar::info($credential);

        if(\Dobby::login($credential))
        {
            return \Redirect::to('admin');
        }

        return view("login");
    }



}
