<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Models\Stock;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function create()
    {
        return view('content.Product.purchase' );
    }

    public function store(PurchaseRequest $request ){
        
    }
}
