<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class changePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function changePassword($id){
    $user = User::findOrFail($id);
    if (auth()->id() == $id) {
        return view('Users.changePassword',compact('user'));
    } else
        abort(403);
   }

   public function updatePassword(ChangePasswordRequest $request,$id){
    try {
        $user = User::findOrFail($id);
        if (auth()->id() == $id) {
            $data = $request->except(['_token' ,'_method','password_confirmation','currentpass']);
            if(Hash::check($request->currentpass,$user->password)){
                $data['password']=Hash::make($data['password']);
                User::where('id', $id)->update($data);
                $request->session()->flush();
                return redirect(route('login'))->with('success','<div class="text-center alert alert-success">Password has been updated please login with the new credientials. </div>');
            }
            else
            return redirect()->back()->with('error','<div class="text-center alert alert-danger">Your current password is incorrect</div>');
        } else
            abort(403);
    } catch (Exception $e) {
           abort(500);
    }
}
}
