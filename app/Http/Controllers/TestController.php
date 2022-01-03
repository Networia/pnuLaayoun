<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestRequest;
use App\Models\Product;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TestController extends Controller
{
    public function index()
    {
        //if (Gate::denies('test','list')) {
        //    session()->flash('toastr', ['type' => 'error' , 'title' => __('toastr.title.error') , 'contant' =>  __('toastr.contant.denies')]);
        //    return back();
        //}

        return view('content.test.table');
    }

    public function api()
    {
        //if (Gate::denies('test','list')) {
        //    session()->flash('toastr', ['type' => 'error' , 'title' => __('toastr.title.error') , 'contant' =>  __('toastr.contant.denies')]);
        //    return back();
        //}

        $model = Test::query();
        return \DataTables::eloquent($model)
        ->toJson();
    }

    public function list_select(Request $data)
    {
        $item = Test::where('f1', 'like', '%'.$data->q.'%')->get();
        $itemCount =  $item->count();
        //? create if not find
        // if ($itemCount == 0) {
        //     $item [] = ['id' =>  $data->q,'name' => $data->q];
        //     $itemCount = 1;
        // }

        return ['total_count' => $itemCount , 'item'=> $item];
    }

    public function list_select_product(Request $data)
    {
        $item = Product::where('name', 'like', '%'.$data->q.'%')->get();
        $itemCount =  $item->count();
        //? create if not find
        // if ($itemCount == 0) {
        //     $item [] = ['id' =>  $data->q,'name' => $data->q];
        //     $itemCount = 1;
        // }

        return ['total_count' => $itemCount , 'item'=> $item];
    }

    public function create()
    {
        if (Gate::denies('test','create')) {
            session()->flash('toastr', ['type' => 'error' , 'title' => __('toastr.title.error') , 'contant' =>  __('toastr.contant.denies')]);
            return back();
        }

        return view('content.test_add');
    }

    public function store(TestRequest $data)
    {
        if (Gate::denies('test','create')) {
            session()->flash('toastr', ['type' => 'error' , 'title' => __('toastr.title.error') , 'contant' =>  __('toastr.contant.denies')]);
            return back();
        }

        Test::create($data->toArray());

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('test'));
    }

    public function edit($id)
    {
        if (Gate::denies('test','edit')) {
            session()->flash('toastr', ['type' => 'error' , 'title' => __('toastr.title.error') , 'contant' =>  __('toastr.contant.denies')]);
            return back();
        }

        $last = Test::findOrFail($id);

        return view('content.test_edit',['last' => $last]);
    }

    public function update(TestRequest $data)
    {
        if (Gate::denies('test','edit')) {
            session()->flash('toastr', ['type' => 'error' , 'title' => __('toastr.title.error') , 'contant' =>  __('toastr.contant.denies')]);
            return back();
        }

        $user = Test::findOrFail($data->id);

        $user->update($data->toArray());

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('test'));
    }
}
