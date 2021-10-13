<?php

use Illuminate\Support\Facades\Route;



Route::get('/admin',function(){

     return view('Admin.admin');
})->middleware(['auth:admin','verified'])->name('admin');


?>
