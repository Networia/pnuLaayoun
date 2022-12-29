<?php

namespace App\Http\Controllers\admin;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Stock;
use App\Models\User;
use App\Models\UserStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function list()
    {
        $pageConfigs = ['pageHeader' => false];
        $roles = Role::all();
        $stocks = Stock::all();

        return view('user.app-user-list', ['pageConfigs' => $pageConfigs, 'roles' => $roles, 'stocks' => $stocks]);
    }

    public function api()
    {
        $model = User::with('roles');
        return \DataTables::eloquent($model)->with([
            'filter_status' => User::select('status as value')->groupBy('status')->get(),
        ])
            ->toJson();
    }

    public function store(UserRequest $input)
    {

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $ids_stocks = $input->input('stocks_ids', []);
        $user->assignRole($input->role);

        $user->stocks()->attach($ids_stocks);

        session()->flash('toastr', ['type' => 'success', 'title' => __('toastr.title.success'), 'contant' =>  __('toastr.contant.success')]);
        return back();
    }

    public function status($id)
    {
        $user = User::findOrFail($id);

        if ($user->status == 1) {
            $user->update([
                'status' => 0
            ]);

            session()->flash('toastr', ['type' => 'success', 'title' => __('toastr.title.success'), 'contant' =>  __('toastr.contant.success')]);
            return back();
        }

        if ($user->status == 0) {
            $user->update([
                'status' => 1
            ]);

            session()->flash('toastr', ['type' => 'success', 'title' => __('toastr.title.success'), 'contant' =>  __('toastr.contant.success')]);
            return back();
        }

        return back();
    }

    public function detail($id)
    {
        $user = User::with('roles')->findOrFail($id);

        return view('user.app-user-view-account', ['user' => $user]);
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
                'unique:users,email,' . $input->id
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

        session()->flash('toastr', ['type' => 'success', 'title' => __('toastr.title.success'), 'contant' =>  __('toastr.contant.success')]);
        return back();
    }

    public function security($id)
    {
        $user = User::findOrFail($id);
        $devices = DB::table('sessions')
            ->where('user_id', $user->id)
            ->get()->reverse();

        return view('user.app-user-view-security', ['user' => $user, 'devices' => $devices]);
    }

    public function password(Request $data)
    {
        $user = User::findOrFail($data->id);

        Validator::make($data->toArray(), [
            'password' => $this->passwordRules(),
        ])->validate();

        $user->update([
            'password' => Hash::make($data->password)
        ]);

        session()->flash('toastr', ['type' => 'success', 'title' => __('toastr.title.success'), 'contant' =>  __('toastr.contant.success')]);

        return back();
    }

    // Two-steps verification

    public function tsv($id)
    {
        $user = User::findOrFail($id);

        $user->forceFill([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
        ])->save();

        session()->flash('toastr', ['type' => 'success', 'title' => __('toastr.title.success'), 'contant' =>  __('toastr.contant.success')]);
        return back();
    }

    public function edit_user_stock($id)
    {
        $user = User::findOrFail($id);
        $stocks_by_user = $user->stocks->pluck('id')->toArray();
        $stocks = Stock::all();
        return view('user.edit-user-stock', ['last' => $user, 'stocks_by_user' => $stocks_by_user, 'stocks' => $stocks]);
    }

    public function update_user_stock($id, Request $request)
    {
        $user = User::findOrFail($id);
        $ids_stocks = $request->input('stocks_ids', []);

        $user->stocks()->sync($ids_stocks);

        session()->flash('toastr', ['type' => 'success', 'title' => __('toastr.title.success'), 'contant' =>  __('toastr.contant.success')]);
        return redirect(route("user.list"));
    }
}
