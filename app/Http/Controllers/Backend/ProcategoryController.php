<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Procategory;
use App\Setting;
use App\Product;
use App\Stock;
use App\Sinvoice;
use DB;

class ProcategoryController extends Controller
{
    
    public function index()
    {
        $procates = Procategory::all();
        //$procates = Product::where('status', 1)->get();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');

        return view('backend.category.product.index')->withProcates($procates)->withShop($shop)->withCopy($copy);
    }

    
    public function create()
    {
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.category.product.create')->withShop($shop)->withCopy($copy);
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:procategories,name'
            ],[
            'name.required' => 'Product category name is mandatory',
            'name.unique' => 'Product category name is unique, please new name !',
            ]);
        $procate = new Procategory;

        $procate->name = $request->name;
        $procate->save();

        return redirect()->route('procategoies.index')->with(['success' => 'Data have been successfully created !']);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $procate = Procategory::find($id);
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.category.product.edit')->withProcate($procate)->withShop($shop)->withCopy($copy);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ''
            ]);
        $procate = Procategory::find($id);

        $procate->name = $request->name;
        $procate->save();

        return redirect()->route('procategoies.index')->with(['success' => 'Data have been successfully updated !']);
    }

   
    public function destroy($id)
    {
        $procate = Procategory::find($id); 
        // $procate = Product::where('procategory_id', $id)->get();
       // dd($procate);
        $procate->products()->delete();
        $procate->stocks()->delete();
        $procate->sinvoices()->delete();
        $procate->delete();

        return redirect()->route('procategoies.index')->with(['success' => 'Data have been successfully deleted !']);
    }
}
