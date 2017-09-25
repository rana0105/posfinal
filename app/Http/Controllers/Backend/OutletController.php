<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outlet;
use App\User;
use App\Role;
use App\Permission;
use App\Authorizable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Hash;
use App\Setting;
use DB;

class OutletController extends Controller
{
    
    public function index()
    {
        $outlets = Outlet::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.outlet.index')->withOut($outlets)->withShop($shop)->withCopy($copy);
    }

    
    public function create()
    {
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.outlet.create')->withShop($shop)->withCopy($copy);
    }

    
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'outlet_name' => '',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'outlet_contact' => '',
            'outlet_address' => '',
            'outlet_status' => ''
            ]);
//dd($request->all());
        $outlet = new Outlet;

        $outlet->out_name = $request->outlet_name;
        $outlet->name = $request->name;
        $outlet->email = $request->email;
        $outlet->password = Hash::make(Input::get('password'));
        $outlet->out_contact = $request->outlet_contact;
        $outlet->out_address = $request->outlet_address;
        $outlet->status = $request->status;

        $outlet->save();

        // if($outlet->save()){
        //    $user = new User;

        //     $user->name = Input::get('name');
        //     $user->email = Input::get('email');
        //     $user->password = Hash::make(Input::get('password'));
        //     $user->outlet_id = $outlet->id;

        //     $user->save();
        // }
        return redirect()->route('outlets.index')->with('success', 'Data have been save !');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $outlet = Outlet::find($id);
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.outlet.edit')->withOutlet($outlet)->withShop($shop)->withCopy($copy);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'outlet_name' => '',
            'outlet_contact' => '',
            'outlet_address' => '',
            'outlet_status' => ''
            ]);

        $outlet = Outlet::find($id);

        $outlet->out_name = $request->outlet_name;
        $outlet->name = $request->name;
        $outlet->email = $request->email;
        $outlet->password = Hash::make(Input::get('password'));
        $outlet->out_contact = $request->outlet_contact;
        $outlet->out_address = $request->outlet_address;
        $outlet->status = $request->status;

        $outlet->save();
        return redirect()->route('outlets.index')->with('success', 'Data have been Updated !');
    }

    
    public function destroy($id)
    {
        $outlet = Outlet::find($id);
        $outlet->delete();
        return redirect()->route('outlets.index')->with('success', 'Data have been Deleted !');
    }
}
