<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PackCate;
use App\Setting;
use DB;

class PackCateController extends Controller
{
    public function index()
    {
        $paccates = PackCate::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.paccate.index')->withPaccates($paccates)->withShop($shop)->withCopy($copy);
    }

   
    public function create()
    {
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.paccate.create')->withShop($shop)->withCopy($copy);
    }

    
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'pac_name' => 'required|max:255'
            ],[
            'pac_name.required' => 'PackCate type name is required',
            ]);

        $paccate = new PackCate;

        $paccate->pac_name = $request->pac_name;

        $paccate->save();

        return redirect()->route('paccates.index')->with('success', 'Data have been succesfully save');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {

        $paccate = PackCate::find($id);
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.paccate.edit')->withPaccate($paccate)->withShop($shop)->withCopy($copy);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pac_name' => 'required|max:255'
            ],[
            'pac_name.required' => 'Customer type name is required',
            ]);

        $paccate = PackCate::find($id);

        $paccate->pac_name = $request->pac_name;

        $paccate->save();

        return redirect()->route('paccates.index')->with('success', 'Data have been succesfully Updated');
    }

    
    public function destroy($id)
    {
        $paccate = PackCate::find($id);
        $paccate->delete();
         return redirect()->route('paccates.index')->with('success', 'Data have been succesfully Deleted');
    }
}
