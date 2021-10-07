<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

    public function detail($id)
    {
        $user = User::findOrFail($id);

        return view('user.app-user-view-account',['user' => $user]);
    }

    public function update(Request $input)
    {
        $user = User::findOrFail($input->id);

        Validator::make($input->toArray(), [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email,'.$input->id
            ],
        ])->validate();

        if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'email_verified_at' => null,
            ])->save();
    
            $user->sendEmailVerificationNotification();
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return back();
    }
}
