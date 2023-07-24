<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TankyouController extends Controller
{
    public function index(){
        view('thankyou');
    }
}
