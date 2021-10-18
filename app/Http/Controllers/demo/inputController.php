<?php

namespace App\Http\Controllers\demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class inputController extends Controller
{
    public function index()
    {
        $last=collect();
        $last->b_n = 'hi';
        $last->test = 1;
        return view('content.demo.input',['last' => $last]);
    }
}
