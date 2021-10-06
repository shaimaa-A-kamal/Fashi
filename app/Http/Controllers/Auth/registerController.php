<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Traits\UploadImage;


class registerController extends Controller
{
    use UploadImage;

    public function __construct()
    {
      $this->middleware('guest');
    }

    public function register(){
        return view('Auth.register');

    }
    public function addUser(RegisterRequest $request){
        try{
             $data=$request->except(['_token','image']);
             if ($request['image'])
                              { $data['image']=   $this->uploadImage($request->file('image'),'users/');}
            event(new Registered( User::create($data)));

            return redirect(url('users/email/verify'));
             }
        catch(expection $e){
             abort(500);
        }
    }
}
