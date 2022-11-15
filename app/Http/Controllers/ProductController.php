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
        $model = Product::with(['categories', 'bones','stocks']);
        return \DataTables::eloquent($model)
        ->toJson();
    }

    //get pneu
    public function pnu()
    {
        $model = Product::with(['categories', 'bones','stocks'])->where('product_categorie_id', 1);
        return \DataTables::eloquent($model)
        ->toJson();
    }

    //get filter
    public function filterapi()
    {
        $model = Product::with(['categories', 'bones','stocks'])->where('product_categorie_id', 2);
        return \DataTables::eloquent($model)
        ->toJson();
    }

    //get Battrie
    public function battrieapi()
    {
        $model = Product::with(['categories', 'bones','stocks'])->where('product_categorie_id', 3);
        return \DataTables::eloquent($model)
        ->toJson();
    }

    //get Chambrière
    public function chambriereapi()
    {
        $model = Product::with(['categories', 'bones','stocks'])->where('product_categorie_id', 4);
        return \DataTables::eloquent($model)
        ->toJson();
    }

     //get huile
     public function huileapi()
     {
         $model = Product::with(['categories', 'bones','stocks'])->where('product_categorie_id', 5);
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

    public function create()
    {
        return view('content.Product.add' );
    }

    public function store(Request $request)
    {
        // dd($request);
        $categorie_id = $request->categorie;
        // $categorie =Categorie::find($categorie_id);

        if($categorie_id == 1){
            $validator = Validator::make($request->all(), [
                'serie_peneu' => 'required|string|max:255',
                'marque_peneu' => 'required|string|max:255',
                'reference_filter' => 'nullable|string|max:255',
                'marque_filter' => 'nullable|string|max:255',
                'marque_baterie' => 'nullable|string|max:255',
                'num_voltage' => 'nullable|string|max:255',
                'serie_chambrere' => 'nullable|string|max:255',
                'marque_chambrere' => 'nullable|string|max:255',
                'serie_huile' => 'nullable|string|max:255',
                'marque_huile' => 'nullable|string|max:255',
                'lettrage_huile' => 'nullable|string|max:255',
                'prix_achat' => 'required|numeric',
                'prix_vente' => 'required|numeric',
                'quantite_dispo' => 'numeric',
                'stock'  => 'required',
            ]);
        }else if($categorie_id == 2){
            $validator = Validator::make($request->all(), [
                'serie_peneu' => 'nullable|string|max:255',
                'marque_peneu' => 'nullable|string|max:255',
                'reference_filter' => 'required|string|max:255',
                'marque_filter' => 'required|string|max:255',
                'marque_baterie' => 'nullable|string|max:255',
                'num_voltage' => 'nullable|string|max:255',
                'serie_chambrere' => 'nullable|string|max:255',
                'marque_chambrere' => 'nullable|string|max:255',
                'serie_huile' => 'nullable|string|max:255',
                'marque_huile' => 'nullable|string|max:255',
                'lettrage_huile' => 'nullable|string|max:255',
                'prix_achat' => 'required|numeric',
                'prix_vente' => 'required|numeric',
                'quantite_dispo' => 'numeric',
                'stock'  => 'required',
            ]);
        }else if($categorie_id == 3){
            $validator = Validator::make($request->all(), [
                'serie_peneu' => 'nullable|string|max:255',
                'marque_peneu' => 'nullable|string|max:255',
                'reference_filter' => 'nullable|string|max:255',
                'marque_filter' => 'nullable|string|max:255',
                'marque_baterie' => 'required|string|max:255',
                'num_voltage' => 'required|string|max:255',
                'serie_chambrere' => 'nullable|string|max:255',
                'marque_chambrere' => 'nullable|string|max:255',
                'serie_huile' => 'nullable|string|max:255',
                'marque_huile' => 'nullable|string|max:255',
                'lettrage_huile' => 'nullable|string|max:255',
                'prix_achat' => 'required|numeric',
                'prix_vente' => 'required|numeric',
                'quantite_dispo' => 'numeric',
                'stock'  => 'required',
            ]);
        }else if($categorie_id == 4){
            $validator = Validator::make($request->all(), [
                'serie_peneu' => 'nullable|string|max:255',
                'marque_peneu' => 'nullable|string|max:255',
                'reference_filter' => 'nullable|string|max:255',
                'marque_filter' => 'nullable|string|max:255',
                'marque_baterie' => 'nullable|string|max:255',
                'num_voltage' => 'nullable|string|max:255',
                'serie_chambrere' => 'required|string|max:255',
                'marque_chambrere' => 'required|string|max:255',
                'serie_huile' => 'nullable|string|max:255',
                'marque_huile' => 'nullable|string|max:255',
                'lettrage_huile' => 'nullable|string|max:255',
                'prix_achat' => 'required|numeric',
                'prix_vente' => 'required|numeric',
                'quantite_dispo' => 'numeric',
                'stock'  => 'required',
            ]);
        }else if($categorie_id == 5){
            $validator = Validator::make($request->all(), [
                'serie_peneu' => 'nullable|string|max:255',
                'marque_peneu' => 'nullable|string|max:255',
                'reference_filter' => 'nullable|string|max:255',
                'marque_filter' => 'nullable|string|max:255',
                'marque_baterie' => 'nullable|string|max:255',
                'num_voltage' => 'nullable|string|max:255',
                'serie_chambrere' => 'nullable|string|max:255',
                'marque_chambrere' => 'nullable|string|max:255',
                'serie_huile' => 'required|string|max:255',
                'marque_huile' => 'required|string|max:255',
                'lettrage_huile' => 'required|string|max:255',
                'prix_achat' => 'required|numeric',
                'prix_vente' => 'required|numeric',
                'quantite_dispo' => 'numeric',
                'stock'  => 'required',
            ]);
        }else if($categorie_id == null){
            $validator = Validator::make($request->all(), [
                'categorie' => 'required',
            ]);
        }

        if ($validator->fails()) {
            return redirect('produits/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // if(!$categorie){
        //     $newCategorie = Categorie::create([
        //         'name'=>$request->categorie,
        //     ]);
        //     $categorie_id = $newCategorie->id;
        // }

        // $validated = $validator->validated();

        $stock_id =$request->stock;
        $stock = Stock::find($stock_id);
        if(!$stock){
            $newStock = Stock::create([
                'name'=>$request->stock,
            ]);
            $stock_id = $newStock->id;
        }

        Product::create([
            'serie_peneu'=>$request->serie_peneu,
            'marque_peneu'=>$request->marque_peneu,
            'reference_filter'=>$request->reference_filter,
            'marque_filter'=>$request->marque_filter,
            'marque_baterie'=>$request->marque_baterie,
            'num_voltage'=>$request->num_voltage,
            'serie_chambrere'=>$request->serie_chambrere,
            'marque_chambrere'=>$request->marque_chambrere,
            'serie_huile'=>$request->serie_huile,
            'marque_huile'=>$request->marque_huile,
            'lettrage_huile'=>$request->lettrage_huile,
            'prix_achat'=>$request->prix_achat,
            'prix_vente'=>$request->prix_vente,
            'quantite_dispo'=>$request->quantite_dispo,
            'product_categorie_id'=>$categorie_id,
            'product_stock_id'=>$stock_id,
            'product_bone_id'=>NULL
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
