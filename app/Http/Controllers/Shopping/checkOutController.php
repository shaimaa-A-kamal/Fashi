<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class checkOutController extends Controller
{
    public function checkout(){
        return view('shopping.check-out');
      }
      public function placeOrder(Request $request){
      }
}
