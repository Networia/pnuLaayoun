<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckRequest;
use App\Models\Check;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CheckController extends Controller
{
    public function index()
    {
        return view('content.Check.table');
    }

    public function api()
    {
        $model = Check::query();
        return \DataTables::eloquent($model)
        ->toJson();
    }

    public function list_select(Request $data)
    {
        $item = Check::where('name', 'like', '%'.$data->q.'%')->get();
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
        return view('content.Check.add');
    }

    public function store(CheckRequest $data)
    {
        // Check::create($data->toArray());

        Check::create([
            'num_check' => $data->num_check,
            'montent_check' => $data->montent_check,
            'status_sup' => false,
            'status_bank' => false,
        ]);

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('check'));
    }

    public function edit($id)
    {
        $last = Check::findOrFail($id);

        return view('content.Check.edit',['last' => $last]);
    }

    public function update(CheckRequest $data)
    {
        $user = Check::findOrFail($data->id);

        $user->update($data->toArray());

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('check'));
    }
}
