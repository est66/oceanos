<?php

namespace App\Http\Controllers;
use Request;
use Auth;
use Session;

class AuthController extends Controller
{

    public function login() {
        return view('auth/login');
    }

    public function check() {
        $email = Request::input('email', '');
        $password = Request::input('password', '');
        if (!Auth::attempt(['email' => $email, 'password' => $password], false)) {
            return redirect()->action('AuthController@login')->with('error', true);
        }
        return redirect(Session::get('oldUrl', 'news'));

    }

    public function logout() {
        //Auth::logout();
        Session::flush();
        return redirect()->action('AuthController@login');
    }

    public function oAuth() {
        header('location: ' . config('services.oAuth.loginUrl'));
        die();
    }

    public function oAuthGoogle() {
        $code = Request::input("code");



        $user = User::firstOrCreate(['email' => 'test', 'password', 'oauth']);
        Auth::login($user);
        return redirect(Session::get('oldUrl', 'news'));

    }


}
