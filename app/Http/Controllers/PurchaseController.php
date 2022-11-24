<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function create()
    {
        return view('content.Product.purchase' );
    }
}
