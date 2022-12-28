<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Models\BoneAchat;
use App\Models\BoneProduit;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function create()
    {
        return view('content.Product.purchase' );
    }

    public function store(PurchaseRequest $request ){
        $supplier_id=$request->supplier;
        $stock_id=$request->stock;
        BoneAchat::create([
            'serie_bone'=>$request->serie_bone,
            'prix_total'=>$request->totalAchat,
            'supplier_id'=>$supplier_id,
            'stock_id'=>$$stock_id,
            'status'=>1,
        ]);
        BoneProduit::create([

        ]);
    }
}
