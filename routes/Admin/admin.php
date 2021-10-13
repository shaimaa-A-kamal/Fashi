<?php

use App\Http\Controllers\Address\CityController;
use App\Http\Controllers\Address\RegionController;
use Illuminate\Support\Facades\Route;



Route::get('/admin',function(){

     return view('Admin.admin');
})->middleware(['auth:admin','verified'])->name('admin');
Route::group(['prefix' =>'admin'],function(){
    Route::resource('regions', RegionController::class);
    Route::resource('cities', CityController::class);
});


?>
