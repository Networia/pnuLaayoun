<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BoneRequest;
use App\Models\Bone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BoneController extends Controller
{
    public function index()
    {
        return view('content.Bone.table');
    }

    public function api()
    {
        $model = Bone::query();
        return \DataTables::eloquent($model)
        ->toJson();
    }

    public function list_select(Request $data)
    {
        $item = Bone::where('name', 'like', '%'.$data->q.'%')->get();
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
        return view('content.Bone.add');
    }

    public function store(BoneRequest $data)
    {
        Bone::create($data->toArray());

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('Bone'));
    }

    public function edit($id)
    {
        $last = Bone::findOrFail($id);

        return view('content.Bone.edit',['last' => $last]);
    }

    public function update(BoneRequest $data)
    {
        $user = Bone::findOrFail($data->id);

        $user->update($data->toArray());

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('Bone'));
    }
}
