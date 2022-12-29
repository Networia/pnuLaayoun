<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoneSalesRequest;
use App\Models\BoneSales;
use App\Models\Credit;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class SalesController extends Controller
{
    public function create()
    {
        return view('content.Sales.add');
    }

    public function autocomplete(Request $request)
    {
        $data = Product::select("reference as value", "designation as designation", "prix_achat as prix_achat", "prix_vente as prix_vente", "id", "quantite_dispo")
            ->where('reference', 'LIKE', '%' . $request->get('search') . '%')
            ->get();

        return response()->json($data);
    }

    public function addBoneSale(BoneSalesRequest $request)
    {
        try {

            $req = $request->all();
            $dataProducts = $req['productsArray'];
               $resultInsert = BoneSales::create([
                   'serie_bone'=>$req['serie_bone'],
                   'prix_total'=> 2222,
                   'client_id'=>$req['client_id'],
                   'stock_id'=>$req['stock_id'],
                   'status'=>1,
               ]);

            return response()->json(
                [
                    'result' => 'success',
                    'data' => $resultInsert,
                    'length' => 0,
                    'message' => __('operation_success'),
                    'date' => date("Y-m-d H:i:s"),
                ]
                , 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            return response()->json(
                [
                    'result' => 'error',
                    'data' => $e->getMessage(),
                    'length' => 0,
                    'message' => __('operation_error'),
                    'date' => date("Y-m-d H:i:s"),
                ]
                , 409, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                JSON_UNESCAPED_UNICODE);
        }
    }
}
