<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
