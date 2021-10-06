<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\registerController;


Route::group(['prefix'=>'users'],function(){
    Route::get('/login',[loginController::Class,'login'])->name('login');
    Route::post('/logout',[loginController::Class,'signOut'])->name('logout');
    Route::post('/login',[loginController::Class,'checkCredentials'])->name('AttemptLogin');

    Route::get('/register',[registerController::Class,'register'])->name('register');
    Route::post('/register',[registerController::Class,'addUser'])->name('addUser');
});

?>
