<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Product;
use App\Sale;
use App\Account;
use App\Sinvoice;
use App\Stock;
use App\Setting;
use DB;

class SaleController extends Controller
{
    
    public function index()
    {
        // $sales = Sale::all();
        // //dd($sales);
        // return view('backend.sale.index')->withSales($sales);
    }

    
    public function create()
    {
        $product = Product::all();
        ///dd($product);
        $customers = Customer::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.sale.create')->withProduct($product)->withCustomers($customers)->withShop($shop)->withCopy($copy);
    }

    public function changeData(Request $request)
    {
        if($request->ajax()){
            $data = Product::where('id',$request->id)->first();
            return response()->json($data);
        }
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'date' => 'required|date',
            'c_name' => '',
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
            'name.required' => 'Product name munt be input!',
            'qtn.required' => 'Quantity must be input!',
            'qtn.integer' => 'Quantity must be integer!',
            'u_price.required' => 'Unit price must be input!'
            ]);
        
        $sale = new Sale;

        $sale->date = $request->date;
        $sale->customer_id = $request->c_name;
        $sale->st_discount = $request->discount;
        $sale->stotal_amount = $request->ntotal;
        $sale->spayment = $request->payment;
        $sale->sdue = $request->due;
        $squantity = $request->qtn;
        $sprice = $request->u_price; 
        $sdiscount = $request->in_dis;
        $svat = $request->vat;
        $sstotal = $request->s_total;
        if($sale->save()){

            foreach ($request->name as $key => $product) {
                $sinoice = new Sinvoice();
                $sinoice->sale_id = $sale->id;
                $sinoice->product_id = $product;
                $sinoice->s_quantity = $squantity[$key];
                $sinoice->sunit_price = $sprice[$key];
                $sinoice->ppdiscount = $sdiscount[$key];
                $sinoice->svat = $svat[$key];
                $sinoice->sstotal = $sstotal[$key];
                $sinoice->save();

                $stock = Stock::where('product_id',$product)->first();
                if($stock){
                    $stock->quantity -= $squantity[$key];
                    $stock->save();
                }
            }

        }
        return redirect()->route('sales.index');
    }

    
    public function show($id)
    {
        $sale = Sale::find($id);
        
        $sinoice = Sinvoice::where('sale_id', $id)->get();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');

        return view('backend.psale.saleinvoice')->withSale($sale)->withSin($sinoice)->withShop($shop)->withCopy($copy);
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
