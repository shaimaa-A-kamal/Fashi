<?php

use App\Http\Controllers\Address\DetailedAddressController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\changePasswordController;
use Illuminate\Support\Facades\Route;


Route::resource('users',UserController::Class);
Route::group(['prefix' => 'users'],function(){
    Route::get('/changePassword/{user_id}',[changePasswordController::class,'changePassword'])->name('changePassword');
    Route::put('/updatePassword/{user_id}',[changePasswordController::class,'updatePassword'])->name('updatePassword');
});

Route::group(['prefix' => 'users/addresses'],function(){
    Route::resource('address',DetailedAddressController::Class);
});


?>
