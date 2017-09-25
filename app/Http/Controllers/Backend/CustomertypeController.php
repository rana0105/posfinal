<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customertype;
use App\Setting;
use DB;

class CustomertypeController extends Controller
{
    
    public function index()
    {
        $types = Customertype::all();

        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');

        return view('backend.customertype.index')->withTypes($types)->withShop($shop)->withCopy($copy);
    }

    
    public function create()
    {
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.customertype.create')->withShop($shop)->withCopy($copy);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'type_name' => 'required|max:255'
            ],[
            'type_name.required' => 'Customer type name is required',
            ]);

        $type = new Customertype;

        $type->type_name = $request->type_name;

        $type->save();

        return redirect()->route('customertypes.index')->with('success', 'Data have been succesfully save');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $type = Customertype::find($id);
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.customertype.edit')->withType($type)->withShop($shop)->withCopy($copy);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type_name' => 'required|max:255'
            ],[
            'type_name.required' => 'Customer type name is required',
            ]);

        $type = Customertype::find($id);

        $type->type_name = $request->type_name;

        $type->save();

        return redirect()->route('customertypes.index')->with('success', 'Data have been succesfully updated');
    }

    
    public function destroy($id)
    {
        $type = Customertype::find($id);

        $type->delete();

        return redirect()->route('customertypes.index')->with('success', 'Data have been succesfully deleted');
    }
}
