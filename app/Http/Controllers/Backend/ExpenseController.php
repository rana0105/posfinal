<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Excategory;
use App\Outlet;
use App\Setting;
use DB;

class ExpenseController extends Controller
{
    
    public function index()
    {
        $expenses = Expense::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.expense.index')->withExpen($expenses)->withShop($shop)->withCopy($copy);
    }

    
    public function create()
    {
        $outlet = Outlet::all();
        $excate = Excategory::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.expense.create')->withExcate($excate)->withOutlet($outlet)->withShop($shop)->withCopy($copy);
    }

    
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'ex_number' => '',
            'outlet_id' => '',
            'excate_id' => '',
            'ex_amount' => '',
            'ex_date' => '',
            'ex_note' => '',
            ]);

        $expen = new Expense;

        $expen->ex_number = $request->ex_number;
        $expen->outlet_id = $request->outlet_id;
        $expen->excate_id = $request->excate_id;
        $expen->ex_amount = $request->ex_amount;
        $expen->ex_date = $request->ex_date;
        $expen->ex_note = $request->ex_note;

        $expen->save();
        return redirect()->route('expenses.index')->with('success', 'Data have been save!');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $expen = Expense::find($id);
        $outlet = Outlet::all();
        $out = array();
        foreach ($outlet as $outle) {
            $out[$outle->id] = $outle->out_name;
        }

        $excate = Excategory::all();
        $exca = array();
        foreach ($excate as $exc) {
            $exca[$exc->id] = $exc->excate_name;
        }
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.expense.edit')->withExpen($expen)->withOut($out)->withExpc($exca)->withShop($shop)->withCopy($copy);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ex_number' => '',
            'outlet_id' => '',
            'excate_id' => '',
            'ex_amount' => '',
            'ex_date' => '',
            'ex_note' => '',
            ]);

        $expen = Expense::find($id);

        $expen->ex_number = $request->ex_number;
        $expen->outlet_id = $request->outlet_id;
        $expen->excate_id = $request->excate_id;
        $expen->ex_amount = $request->ex_amount;
        $expen->ex_date = $request->ex_date;
        $expen->ex_note = $request->ex_note;

        $expen->save();
        return redirect()->route('expenses.index')->with('success', 'Data have been Updated!');
    }

    
    public function destroy($id)
    {
        $expen = Expense::find($id);
        $expen->delete();
        return redirect()->route('expenses.index')->with('success', 'Data have been Deleted!');
    }
}
