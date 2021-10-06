<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function blogs(){
        return view('blog.blog');

    }
    public function blog(Request $request){
        return view('blog.blog-details');
    }
}
