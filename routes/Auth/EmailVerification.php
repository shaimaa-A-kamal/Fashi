<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerificationController;



Route::group(['prefix'=>'users'],function(){

    Route::get('/email/verify',[VerificationController::class,'sendVerifyEmail'])->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}',[VerificationController::class,'verifyUser'])->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification',[VerificationController::class,'resend'])->middleware( ['throttle:6,1'])->name('verification.resend');
});
