<?php

namespace App\Http\Controllers\demo;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class inputController extends Controller
{
    public function index()
    {
        $last = User::with('product')->find(1);

        return view('content.demo.input',['last' => $last]);
    }
}
