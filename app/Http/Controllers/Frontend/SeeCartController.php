<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeeCartController extends Controller
{
    public function index()
    {
        return view('frontend.carts.index');
    }
}
