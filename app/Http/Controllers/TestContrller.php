<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestContrller extends Controller
{

    public function index(){
        return view('admin.category.test');
    }
    public function store()
    {
        return "hello test";
    }
}
