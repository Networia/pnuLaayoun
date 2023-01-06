<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockRequest;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StockController extends Controller
{
    public function index()
    {
        return view('content.Stock.table');
    }

    public function api()
    {
        $model = Stock::with('users');
        return \DataTables::eloquent($model)->with([
            'users' => User::all(),
        ])
        ->toJson();
    }

    public function list_select(Request $data)
    {
        $item = Stock::where('name', 'like', '%'.$data->q.'%')->get();
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
        return view('content.Stock.add');
    }

    public function store(StockRequest $data)
    {
        Stock::create($data->toArray());

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('Stock'));
    }

    public function edit($id)
    {
        $last = Stock::findOrFail($id);

        return view('content.Stock.edit',['last' => $last]);
    }

    public function update(StockRequest $data)
    {
        $user = Stock::findOrFail($data->id);

        $user->update($data->toArray());

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('Stock'));
    }
    public function edit_user_in_stock($id)
    {
        $last = Stock::findOrFail($id);
        $users_by_stock = $last->users->pluck('id')->toArray();

        $users = User::all();

        return view('content.Stock.add-user-to-stock',['last' => $last, 'users' => $users, 'users_by_stock' => $users_by_stock]);
    }

    public function update_user_in_stock($id, Request $data)
    {
        $stock = Stock::findOrFail($id);
        $ids_users = $data->input('users_ids', []);

        $stock->users()->sync($ids_users);

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('Stock'));
    }
}
