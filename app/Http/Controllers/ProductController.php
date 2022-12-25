<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        return view('content.Product.table');
    }

    public function api()
    {
        $model = Product::with(['categories', 'stocks']);
        return \DataTables::eloquent($model)
        ->toJson();
    }

    //get pneu
    public function pnu()
    {
        $model = Product::with(['categories', 'stocks'])->where('categorie_id', 1);
        return \DataTables::eloquent($model)
        ->toJson();
    }

    //get filter
    public function filterapi()
    {
        $model = Product::with(['categories', 'stocks'])->where('categorie_id', 2);
        return \DataTables::eloquent($model)
        ->toJson();
    }

    //get Battrie
    public function battrieapi()
    {
        $model = Product::with(['categories', 'stocks'])->where('categorie_id', 3);
        return \DataTables::eloquent($model)
        ->toJson();
    }

    //get Chambrière
    public function chambriereapi()
    {
        $model = Product::with(['categories', 'stocks'])->where('categorie_id', 4);
        return \DataTables::eloquent($model)
        ->toJson();
    }

     //get huile
     public function huileapi()
     {
         $model = Product::with(['categories', 'stocks'])->where('categorie_id', 5);
         return \DataTables::eloquent($model)
         ->toJson();
     }

    public function list_select(Request $data)
    {
        $item = Product::where('name', 'like', '%'.$data->q.'%')->get();
        $itemCount =  $item->count();
        //? create if not find
        //if ($itemCount == 0) {
        //    $item [] = ['id' =>  $data->q,'name' => $data->q];
        //    $itemCount = 1;
        //}

        return ['total_count' => $itemCount , 'item'=> $item];
    }

    public function autocomplete(Request $request)
    {
        $data = Product::select("reference as value" , "designation as designation", "prix_achat as prix_achat" , "prix_vente as prix_vente", "id")
            ->where('reference', 'LIKE', '%'. $request->get('search'). '%')
            ->get();

        return response()->json($data);
    }

    public function getAllreferance(){
        $references = Product::all();
        return $references;
    }

    public function create()
    {
        return view('content.Product.add' );
    }

    public function store(ProductRequest $request)
    {
        // dd($request);
        $categorie_id = $request->categorie;
        // $categorie =Categorie::find($categorie_id);

        $stock_id =$request->stock;
        $stock = Stock::find($stock_id);
        if(!$stock){
            $newStock = Stock::create([
                'name'=>$request->stock,
            ]);
            $stock_id = $newStock->id;
        }

        Product::create([
            'reference'=>$request->reference,
            'designation'=>$request->designation,
            'prix_achat'=>$request->prix_achat,
            'prix_vente'=>$request->prix_vente,
            'quantite_dispo'=> 0,
            'categorie_id'=>$categorie_id,
            'stock_id'=>$stock_id,
        ]);

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('Product'));
    }

    public function edit($id)
    {
        $last = Product::findOrFail($id);

        return view('content.Product.edit',['last' => $last]);
    }

    public function update(ProductRequest $data)
    {
        $user = Product::findOrFail($data->id);

        $user->update($data->toArray());

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('Product'));
    }

    //test purchase
    public function purchase(){
        return view('content.Product.purchase');
    }
}
