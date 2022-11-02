<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClientController extends Controller
{
    public function index()
    {
        return view('content.Client.table');
    }

    public function api()
    {
        $model = Client::query();
        return \DataTables::eloquent($model)
        ->toJson();
    }

    public function list_select(Request $data)
    {
        $item = Client::where('name', 'like', '%'.$data->q.'%')->get();
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
        return view('content.Client.add');
    }

    public function store(ClientRequest $data)
    {
        //dd($data);
        Client::create($data->toArray());
        // Client::create([
        //     'name' => $data->count,
        //     'number_phone' => $data->number_phone,
        //     'adress' => $data->adress,
        // ]);;

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('client'));
    }

    public function edit($id)
    {
        $last = Client::findOrFail($id);

        return view('content.Client.edit',['last' => $last]);
    }

    public function update(ClientRequest $data)
    {
        $user = Client::findOrFail($data->id);

        $user->update($data->toArray());

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('client'));
    }
}
