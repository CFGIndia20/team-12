<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;

class ComplainController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
