<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        return view('content.Product.table');
    }

    public function api()
    {
        $model = Product::query();
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
        return view('content.Product.add');
    }

    public function store(ProductRequest $data)
    {
        Product::create($data->toArray());

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
