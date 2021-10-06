<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest')->except('signOut');
    }
    public function login(){
        return view('Auth.login');
    }
    public function checkCredentials(LoginRequest $request){
        $credentials=$request->except('_token','remember');
        $remember_me=$request['remember'] ? true :false;
        if (Auth::attempt($credentials, $remember_me)) {
            $request->session()->regenerate();
            if (auth()->user()->user_type == 2)
                 return redirect()->intended('/admin');
            else
                return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function signOut(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
