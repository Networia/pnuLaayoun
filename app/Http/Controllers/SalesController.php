<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function create()
    {
        return view('content.Sales.add');
    }

    public function autocomplete(Request $request)
    {
        $data = Product::select("reference as value" , "designation as designation", "prix_achat as prix_achat" , "prix_vente as prix_vente", "id","quantite_dispo")
            ->where('reference', 'LIKE', '%'. $request->get('search'). '%')
            ->get();

        return response()->json($data);
    }
}
