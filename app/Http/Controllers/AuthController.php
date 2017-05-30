<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $credentials = array(
            'email' => $email,
            'password' => $password
        );
        if (!auth()->attempt($credentials)){
            return redirect()->back();
        }

        return redirect('/home');
    }

    public function destroy(){
        auth()->logout();
        return redirect('/');
    }
    //
}
