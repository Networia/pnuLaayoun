<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use Illuminate\Support\Facades\DB;
use App\Models\BoneAchat;
use App\Models\BoneProduit;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class PurchaseController extends Controller
{

    public function create()
    {
        return view('content.Product.purchase' );
    }

    public function store(PurchaseRequest $request ){
        try {
            DB::beginTransaction();
            $req = $request->all();
            $dataProducts = $req['productsArray'];
            $dataProductBone = null;
               $resultInsert = BoneAchat::create([
                   'serie_bone'=>$req['serie_bone'],
                   'prix_total'=> $req['prix_total'],
                   'supplier_id'=>$req['supplier_id'],
                   'stock_id'=>$req['stock_id'],
                   'status'=>1,
               ]);
               if ($resultInsert){
                   collect($dataProducts)->each(function ($product) use (&$dataProductBone,$resultInsert) {
                       DB::table('products')
                           ->where('id', json_decode($product['id']))
                           ->update(['prix_achat' => json_decode($product['prix'])]);

                       $dataProductBone =  BoneProduit::create([
                           'prix_achat'=>json_decode($product['prix']),
                           'prouduit_id'=> json_decode($product['id']),
                           'quantity'=> json_decode($product['quantity']),
                           'boneAchat_id'=>$resultInsert['id'],
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


        $supplier_id=$request->supplier;
        $stock_id=$request->stock;
        BoneAchat::create([
            'serie_bone'=>$request->serie_bone,
            'prix_total'=>$request->totalAchat,
            'supplier_id'=>$supplier_id,
            'stock_id'=>$$stock_id,
            'status'=>1,
        ]);
        $dataProducts = $request['productsArray'];
        foreach ($dataProducts as $p) {
            BoneProduit::create([

            ]);
        }
        // $request->productsArray;
        
    }
}
