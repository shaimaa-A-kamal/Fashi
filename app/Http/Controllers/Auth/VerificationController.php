<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

//   public function __construct(){
//         $this->middleware('auth')->except('sendVerifyEmail');
//   }
  public function sendVerifyEmail(){
    return view('auth.verify-email');
  }

  public function verifyUser(EmailVerificationRequest $request ){
    $request->fulfill();
    $user=auth()->user();
    $user->status=1;
    $user->save();
    if(Auth::getDefaultDriver() == 'web')
        return redirect('/');
    elseif(Auth::getDefaultDriver() == 'admin')
        return redirect('/admin');
    else
    return redirect()->route('login');
  }

  public function resend(Request $request){
   try{
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
   }
   catch(Exception $e){
       dd($e);
   }

  }

}
