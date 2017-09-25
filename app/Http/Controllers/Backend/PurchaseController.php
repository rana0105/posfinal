<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Purchase;
use App\Supplier;
use App\Stock;
use App\Setting;
use DB;


class PurchaseController extends Controller
{
    
    public function index()
    {
        $purchases = Purchase::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.purchase.index')->withPurchases($purchases)->withShop($shop)->withCopy($copy);
    }

    
    public function create()
    {
        $product = Product::where('status', 1)->get();
        $suppliers = Supplier::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.purchase.create')->withProduct($product)->withSuppliers($suppliers)->withShop($shop)->withCopy($copy);
    }

    public function stock()
    {
        $stocks = Stock::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.stock.stock')->withStocks($stocks)->withShop($shop)->withCopy($copy);
    }
    
    public function store(Request $request)
    {
       // dd($request->all());
         
        $this->validate($request, [
            'date' => 'required|date',
            'supplier_name' => 'required',
            'name' => 'required',
            'qtn' => 'required',
            'u_price' => 'required',
            'in_dis' => '',
            'vat' => '',
            's_total' => '',
            'discount' => '',
            'ntotal' => '',
            'payment' => '',
            'due' => ''
            ],[
            'date.required' => 'Date must be input!',
            'supplier_name.required' => 'Supplier name munt be input!',
            'name.required' => 'Product name munt be input!',
            'qtn.required' => 'Quantity must be input!',
            'qtn.integer' => 'Quantity must be integer!',
            'u_price.required' => 'Unit price must be input!'
            ]);
        //dd($request->all());
        $purchase = new Purchase;

        $purchase->date = $request->date;
        $purchase->supplier_id = $request->supplier_name;
        // $purchase->product_id = $request->name;
        $purchase->t_discount = $request->discount;
        $purchase->total_amount = $request->ntotal;
        $purchase->payment = $request->payment;
        $purchase->due = $request->due;
        $quantity = $request->qtn;
        $price = $request->u_price; 
        if($purchase->save()){

            foreach ($request->name as $key => $product) {
                $stock = Stock::where('product_id',$product)->first();
                if($stock){
                    $stock->quantity += $quantity[$key];
                    $stock->unit_price = $price[$key];
                    $stock->save();
                }else{
                    $stock = new Stock();
                    $stock->product_id = $product;
                    $stock->quantity = $quantity[$key];
                    $stock->unit_price = $price[$key];
                    $stock->save();
                }
                
            }

        }
        return redirect()->route('purchases.index')->with('success' , 'Data have been save!');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        
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
