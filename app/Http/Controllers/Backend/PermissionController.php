<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Setting;
use DB;

class PermissionController extends Controller
{
    
    public function index()
    {
        $permissions = Permission::orderBy('id', 'ASC')->paginate(10);
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');

        return view('backend.permission.index')->withPermissions($permissions)->withShop($shop)->withCopy($copy);
    }

    
    public function create()

    {
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.permission.create')->withShop($shop)->withCopy($copy);
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:permissions,name',
            'guard_name' => '',
            'display_name' => ''
            ],[
            'name.required' => 'Permission name is mandatory',
            'name.unique' => 'Permission name is unique, please new name !',
            ]);
        $permission = new Permission;

        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->display_name = $request->display_name;
        $permission->save();

        return redirect()->route('permissions.index')->with(['success' => 'Data have been successfully created !']);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        $permission = Permission::find($id);
        return view('backend.permission.edit')->withPermission($permission)->withShop($shop)->withCopy($copy);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => '',
            'guard_name' => '',
            'display_name' => ''
            ]);
        $permission = Permission::find($id);

        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->display_name = $request->display_name;
        $permission->save();

        return redirect()->route('permissions.index')->with(['success' => 'Data have been successfully updated !']);
    }

   
    public function destroy($id)
    {
        //dd($id);
        $permission = Permission::find($id);

        $permission->delete();

        return redirect()->route('permissions.index')->with(['success' => 'Data have been successfully deleted !']);
    }
}
