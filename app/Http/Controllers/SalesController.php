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
        $data = Product::select("reference as value", "id")
            ->where('reference', 'LIKE', '%'. $request->get('search'). '%')
            ->get();

        return response()->json($data);
    }
}
