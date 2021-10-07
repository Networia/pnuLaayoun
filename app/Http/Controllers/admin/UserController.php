<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('user.app-user-list', ['pageConfigs' => $pageConfigs]);
    }

    public function api()
    {
        $model = User::query();
        return \DataTables::eloquent($model)->with([
            'filter_status' => User::select('status as value')->groupBy('status')->get(),
        ])
        ->toJson();
    }

    public function store(UserRequest $input)
    {
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return back();
    }

    public function status($id)
    {
        $user = User::findOrFail($id);

        if ($user->status == 1) {
            $user->update([
                'status' => 0
            ]);

            session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
            return back();
        }

        if ($user->status == 0) {
            $user->update([
                'status' => 1
            ]);

            session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
            return back();
        }

        return back();
    }
}
