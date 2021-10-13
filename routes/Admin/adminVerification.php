<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerificationController;


Route::group(['prefix'=>'admins'],function(){

    Route::get('/email/verify',[VerificationController::class,'sendVerifyEmail'])->name('admin.verification.notice');

    Route::get('/email/verify/{id}/{hash}',[VerificationController::class,'verifyUser'])->middleware(['signed'])->name('admin.verification.verify')->middleware('auth:admin');

    Route::post('/email/verification-notification',[VerificationController::class,'resend'])->middleware( ['throttle:6,1'])->name('admin.verification.resend')->middleware('auth:admin');
});
?>
