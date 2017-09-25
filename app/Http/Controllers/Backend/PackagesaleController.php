<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PackCate;
use App\Product;
use App\Package;
use App\PackageStock;
use App\PackageSale;
use App\Setting;
use DB;

class PackagesaleController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        $pacates = PackCate::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.packsale.create')->withPacates($pacates)->withShop($shop)->withCopy($copy);
    }


    public function loadPackage(Request $request){
        dd($request);
        if($request->ajax()){
            $output ='';
            $pacates = PackCate::all();
            dd($pacates);
            if(sizeof($pacates)>0){
                foreach ($pacates as $key => $value) {
                    $output .='<div class="col-md-2" style="border: solid 2px #036d21; margin: 2px; min-height: 50px;">
                            <div class="productinfo text-center"> 
                                
                                <p><b>'. $value->pac_name .'</b></p>
                                <input type="hidden" name="" value="'.$value->id.'" class="id">
                            </div>
                            </div>';
                }
            }else{
                $output .='Do not package';
            }

            return Response($output);
        }
    }

    
    public function store(Request $request)
    {
        //
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
