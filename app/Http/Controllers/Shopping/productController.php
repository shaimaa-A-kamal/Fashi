<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function products(){
        return view('shopping.products.shop');
    }
    public function product(Request $request){
        return view('shopping.products.product');
    }
}
