<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function index()
    {
        $pageConfigs = ['pageHeader' => false,];
        $roles = Role::with('users:id,name,image')->get();
        $permission = Permission::all('name');

        $permissions = $permission->groupBy(function ($item, $key) {
            return explode('_',$item['name'])[0];
        });

        // return $permissions;
        
        return view('role.app-access-roles',[
            'pageConfigs' => $pageConfigs,
            'roles' => $roles,
            'permissions' => $permissions->all()
        ]);
    }

    public function create(Request $data)
    {
        if (Role::where('name' , $data->modalRoleName)->first()) {
            session()->flash('toastr', ['type' => 'error' , 'title' => __('toastr.title.error') , 'contant' =>  __('toastr.contant.error')]);
            return back();
        }

        $role = Role::create([
            'name' => $data->modalRoleName
        ]);

        $role->givePermissionTo($data->permissions);

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('role'));
    }

    public function edit($id)
    {
        $role = Role::with('permissions:name')->findOrFail($id);
        return $role;
    }

    public function update(Request $data)
    {
        $role = Role::findOrFail($data->id);

        $role->update([
            'name' => $data->modalRoleName
        ]);

        $role->syncPermissions($data->permissions);

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('role'));
    }
}
