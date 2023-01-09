<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoneSalesRequest;
use App\Models\BoneSales;
use App\Models\BoneSalesProducts;
use App\Models\Credit;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $data = Product::select("reference as value", "designation as designation", "prix_achat as prix_achat", "prix_vente as prix_vente", "products.id", "quantite_dispo","product_stock.stock_id")
            ->join('product_stock', 'product_stock.product_id', '=', 'products.id')
            ->where('product_stock.stock_id', '=' , $request->get('stock_id'))
            ->where('reference', 'LIKE', '%' . $request->get('search') . '%')
            ->get();

        return response()->json($data);
    }

    public function addBoneSale(BoneSalesRequest $request)
    {
        try {
            DB::beginTransaction();
            $req = $request->all();
            $dataProducts = $req['productsArray'];
            $dataProductBone = null;
               $resultInsert = BoneSales::create([
                   'serie_bone'=>$req['serie_bone'],
                   'prix_total'=> $req['prix_total'],
                   'client_id'=>$req['client_id'],
                   'stock_id'=>$req['stock_id'],
                   'status'=>1,
               ]);
               if ($resultInsert){
                   collect($dataProducts)->each(function ($product) use (&$dataProductBone,$resultInsert) {
                       $quantity =DB::table('product_stock')->where('product_stock.product_id', json_decode($product['id']))->value('quantite_dispo');
                       DB::table('product_stock')
                           ->where('product_stock.product_id', json_decode($product['id']))
                           ->update(['prix_vente' => json_decode($product['prix']),'quantite_dispo' => intval($quantity) - json_decode($product['quantity'])]);

                       $dataProductBone =  BoneSalesProducts::create([
                           'prix_vente'=>json_decode($product['prix']),
                           'produit_id'=> json_decode($product['id']),
                           'quantity'=> json_decode($product['quantity']),
                           'boneSales_id'=>$resultInsert['id'],
                           'status'=>1,
                       ]);
                   });
               }else
               {
                   DB::rollBack();
                   return false;
               }

            DB::commit();

            return response()->json(
                [
                    'result' => 'success',
                    'data' => $dataProductBone,
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
