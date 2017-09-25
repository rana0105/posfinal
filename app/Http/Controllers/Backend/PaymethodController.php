<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paymethod;
use App\Setting;
use DB;

class PaymethodController extends Controller
{
   
    public function index()
    {
        $paymethods = Paymethod::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.paymethod.index')->withPay($paymethods)->withShop($shop)->withCopy($copy);
    }

    
    public function create()
    {
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.paymethod.create')->withShop($shop)->withCopy($copy);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'pay_name' => 'required|max:255',
            'status' => ''
            ]);

        $paym = new Paymethod;

        $paym->pay_name = $request->pay_name;
        $paym->status = $request->status;

        $paym->save();

        return redirect()->route('paymethods.index')->with('success', 'Data have been save !');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $paym = Paymethod::find($id);
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.paymethod.edit')->withPay($paym)->withShop($shop)->withCopy($copy);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pay_name' => '',
            'status' => ''
            ]);

        $paym = Paymethod::find($id);

        $paym->pay_name = $request->pay_name;
        $paym->status = $request->status;

        $paym->save();

        return redirect()->route('paymethods.index')->with('success', 'Data have been Updated !');
    }

    
    public function destroy($id)
    {
        $paym = Paymethod::find($id);
        $paym->delete();
        return redirect()->route('paymethods.index')->with('success', 'Data have been Deleted !');
    }
}
