<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BackProduct;
use App\Product;
use App\Stock;
use App\Setting;
use DB;

class BackProductController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        $product = Product::where('status', 1)->get();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.backpro.create')->withProduct($product)->withShop($shop)->withCopy($copy);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'qtn' => 'required'
            // 'u_price' => 'required'
            ],[
            'name.required' => 'Product name munt be input!',
            'qtn.required' => 'Quantity must be input!',
            'qtn.integer' => 'Quantity must be integer!',
            // 'u_price.required' => 'Unit price must be input!'
            ]);
       // dd($request->all());
        $backproduct = new BackProduct;

        $backproduct->date = $request->date;
        $quantity = $request->qtn;
        // $price = $request->u_price; 
        if($backproduct->save()){

            foreach ($request->name as $key => $product) {
                $stock = Stock::where('product_id',$product)->first();
                if($stock){
                    $stock->quantity += $quantity[$key];
                    // $stock->unit_price = $price[$key];
                    $stock->save();
                }else{
                    $stock = new Stock();
                    $stock->product_id = $product;
                    $stock->quantity = $quantity[$key];
                    // $stock->unit_price = $price[$key];
                    $stock->save();
                }
                
            }

        }
        return redirect()->route('stocks.index')->with('success' , 'Data have been save!');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
