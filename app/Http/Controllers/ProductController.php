<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function fnb(){
        return view('products.fnb');
    }

    public function beauty(){
        return view('products.beautyhealth');
    }

    public function homecare(){
        return view('products.homecare');
    }

    public function baby(){
        return view('products.babykid');
    }
}
