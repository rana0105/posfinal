<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Excategory;
use App\Setting;
use DB;

class ExcategoryController extends Controller
{
    
    public function index()
    {
        $excates = Excategory::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.expencate.index')->withExcates($excates)->withShop($shop)->withCopy($copy);
    }

   
    public function create()
    {
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.expencate.create')->withShop($shop)->withCopy($copy);
    }

    
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'excate_name' => 'required|max:255'
            ],[
            'excate_name.required' => 'Customer type name is required',
            ]);

        $excate = new Excategory;

        $excate->excate_name = $request->excate_name;

        $excate->save();

        return redirect()->route('excategories.index')->with('success', 'Data have been succesfully save');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $excate = Excategory::find($id);
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.expencate.edit')->withExcate($excate)->withShop($shop)->withCopy($copy);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'excate_name' => 'required|max:255'
            ],[
            'excate_name.required' => 'Customer type name is required',
            ]);

        $excate = Excategory::find($id);

        $excate->excate_name = $request->excate_name;

        $excate->save();

        return redirect()->route('excategories.index')->with('success', 'Data have been succesfully Updated');
    }

    
    public function destroy($id)
    {
       
        $excate = Excategory::find($id);
        $excate->delete();
         return redirect()->route('excategories.index')->with('success', 'Data have been succesfully Deleted');
    }
}
