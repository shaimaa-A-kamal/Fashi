<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ResetPasswordController;


Route::group(['prefix'=>'users'],function(){

    Route::get('/forgot-password',[ResetPasswordController::class,'requestPassword'])->name('password.request');
    Route::post('/forgot-password',[ResetPasswordController::class,'passwordEmail'])->name('password.email');

    Route::get('/reset-password/{token}',[ResetPasswordController::class,'passwordReset'])->name('password.reset');

    Route::post('/reset-password',[ResetPasswordController::class,'passwordUpdate'])->name('password.update');

});
