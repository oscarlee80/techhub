<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }
}
