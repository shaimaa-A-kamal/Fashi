<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/admin',function(){

     return view('Admin.admin');
})->middleware(['isAdmin','verified'])->name('admin');

?>
