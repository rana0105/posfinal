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
use App\Procategory;
use App\Supplier;
use App\PackCate;
use App\Package;
use App\PackageStock;
use App\PackageSale;
use App\Setting;
use DB;
use App\User;
use App\Notifications\ProductStock;
use Auth;



class PsaleController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        $product = Product::where('procategory_id',1)->get();
        $customers = Customer::all();
        $procategories = Procategory::all();
        $suppliers = Supplier::all();
        $pacates = PackCate::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.psale.create')->withProduct($product)->withCustomers($customers)->withProcates($procategories)->withSuppliers($suppliers)->withPacates($pacates)->withShop($shop)->withCopy($copy);
    }
    public function loadProduct(Request $request){
        if($request->ajax()){
            $output ='';
            $product = Product::where('procategory_id',$request->id)->get();
            
            if(sizeof($product)>0){
                foreach ($product as $key => $value) {
                    $output .='<div class="col-md-2" style="border: solid 2px #036d21; margin: 2px; min-height: 50px;">
                            <div class="productinfo text-center"> 
                                <img src="'.asset('upload_file/resize_images/'.$value->image).'" alt="" style="height: 40px; width: 50px;" />
                                <p><b>'. $value->sale_price .'</b></p>
                                <input type="hidden" name="" value="'.$value->id.'" class="id">
                            </div>
                            </div>';
                }
            }else{
                $output .='Do not product';
            }

            return Response($output);
        }
    }

    
    public function checkQuantity(Request $request){
        $status = Product::where('id', $request->id)->first();
        if($status->status == 1){
            $model = Stock::where('product_id',$request->id)->first();
            return $model->quantity;
        }else{
            $model1 = PackageStock::where('propac_id', $request->id)->get();
            //dd($model1);
            if(sizeof($model1)>0){
                foreach ($model1 as $key => $value) {
                    $pro = Stock::where('product_id',$value->product_id)->first();
                    //dd($pro);
                    if($pro){
                        if($pro->quantity < $value->pquantity){
                            return 0;
                        }else{
                            return 1;
                        }
                    }
                }
            }  
        }
        
    }
    public function addToCart(Request $request){
        
        if($request->ajax()){
            $output ='';
            $task = $request->taskArray;
            $quantity = $request->quantity;
           
            if(sizeof($task)>0){
                
                foreach ($task as $key => $value) { 
                    
                    if($request->id != $value){

                        $product = Product::where('id',$value)->first(); 
                        if($product){
                            $output .='<tr> 
                                        
                                        <td><input type="hidden" name="pro_name[]" class="p_id" id="p_id" value="'.$product->id.'">'.$product->name.'</td>
                                        <td> 
                                            <div class="input-group spinner" data-trigger="spinner">
                                                  <input type="text" class="form-control text-center spinner qnt"  id="'.$product->id.'" value="'.$quantity[$key].'" data-rule="quantity" name="qnt[]">
                                                  <div class="input-group-addon">
                                                    <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-caret-up"></i></a>
                                                    <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-caret-down"></i></a>
                                                  </div>
                                            </div>
                                        </td>
                                        <td><input type="text" name="u_price[]" value="'.$product->sale_price.'" readonly="" class="form-control u_price"></td>
                                        <td><input type="text" name="in_dis[]" value="'.$product->discount.'" class="form-control in_dis"></td>
                                        <td><input type="text" name="vat[]" value="'.$product->tax.'" class="form-control vat"></td>
                                        <td><input type="text" name="s_total[]" value="'.$product->getTotalPrice($product->sale_price,$product->discount,$product->tax,$quantity[$key]).'" class="form-control s_total"></td>
                                        <td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>
                                    </tr>';
                        }
                    }else{
                       // dd($key);
                        $product = Product::where('id',$value)->first();
                        if($product){
                            $output .='<tr>
                            
                                    
                                    <td><input type="hidden" name="pro_name[]" class="p_id" id="p_id" value="'.$product->id.'">'.$product->name.'</td>
                                    <td> 
                                                <div class="input-group spinner" data-trigger="spinner">';
                                                    if(sizeof($quantity) == sizeof($task)){
                                                        $output .='<input type="text" class="form-control text-center spinner qnt"  id="'.$product->id.'" value="'.$quantity[$key].'" data-rule="quantity" name="qnt[]">' ;
                                                    }else{
                                                        $output .='<input type="text" class="form-control text-center spinner qnt"  id="'.$product->id.'" value="1" data-rule="quantity" name="qnt[]">';
                                                    }
                                                      
                                                      $output .='<div class="input-group-addon">
                                                        <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-caret-up"></i></a>
                                                        <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-caret-down"></i></a>
                                                      </div>
                                                </div>
                                            </td>
                                    <td><input type="text" name="u_price[]" value="'.$product->sale_price.'" readonly="" class="form-control u_price"></td>
                                    <td><input type="text" name="in_dis[]" value="'.$product->discount.'" class="form-control in_dis"></td>
                                    <td><input type="text" name="vat[]" value="'.$product->tax.'" class="form-control vat"></td>';
                                    if(sizeof($quantity) == sizeof($task)){
                                        $output .='<td><input type="text" name="s_total[]" value="'.$product->getTotalPrice($product->sale_price,$product->discount,$product->tax,$quantity[$key]).'" class="form-control s_total"></td>';
                                    }else{
                                        $output .= '<td><input type="text" name="s_total[]" value="'.$product->getTotalPrice($product->sale_price,$product->discount,$product->tax,1).'" class="form-control s_total"></td>';
                                    }
                                    
                                    $output .='<td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>
                                </tr>';
                        }
                    }
                }  
            }
            else{
                $product = Product::where('id',$request->id)->first();
                if($product){
                    $output .='<tr>
                    
                            
                            <td><input type="hidden" name="pro_name[]" class="p_id" id="p_id" value="'.$product->id.'">'.$product->name.'</td>
                            <td> 
                                        <div class="input-group spinner" data-trigger="spinner">
                                              <input type="text" class="form-control text-center spinner qnt" id="'.$product->id.'" value="1" data-rule="quantity" name="qnt[]">
                                              <div class="input-group-addon">
                                                <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-caret-up"></i></a>
                                                <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-caret-down"></i></a>
                                              </div>
                                        </div>
                                    </td>
                            <td><input type="text" name="u_price[]" value="'.$product->sale_price.'" readonly="" class="form-control u_price"></td>
                            <td><input type="text" name="in_dis[]" value="'.$product->discount.'" class="form-control in_dis"></td>
                            <td><input type="text" name="vat[]" value="'.$product->tax.'" class="form-control vat"></td>
                            <td><input type="text" name="s_total[]" value="'.$product->getTotalPrice($product->sale_price,$product->discount,$product->tax,1).'" class="form-control s_total"></td>
                            <td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>
                        </tr>';
                }
            }
            
            return Response($output);
        }
    }

    public function loadPackage(Request $request){
        if($request->ajax()){
            $output ='';
            $pacates = Product::where('status', 0)->where('actinact', 1)->get();
            if(sizeof($pacates)>0){
                foreach ($pacates as $key => $value) {
                    $output .='<div class="col-md-2" style="border: solid 2px #036d21; margin: 2px; height: 72px;">
                            <div class="productinfo text-center"> 
                                
                                <p style="margin: 2px;"><b>'. $value->name .'</b></p>
                                <p><b>'. $value->sale_price .'</b></p>
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

    // public function checkPackageQuantity(Request $request){

    //     $model = PackageStock::where('propac_id', $request->id)->get();
    //     if(sizeof($model)>0){
    //         foreach ($model as $key => $value) {
    //             $pro = Stock::where('product_id',$value->product_id)->first();
    //             if($pro){
    //                 if($pro->quantity < $value->pquantity){
    //                     return 0;
    //                 }else{
    //                     return 1;
    //                 }
    //             }
    //         }
    //     }       
    // }
    
    // public function addPacakge(Request $request){

    //     if($request->ajax()){
    //         $output ='';
    //         $task = $request->taskArray;
    //         //dd($task);
    //         $quantity = $request->quantity;
    //        // dd($quantity);
    //         if(sizeof($task)>0){
                
    //             foreach ($task as $key => $value) {
                    
    //                 if($request->id != $value){

    //                     // $product =  DB::table('pack_cates')
    //                     // ->join('packages', 'pack_cates.id', '=', 'packages.pacate_id')->where('pack_cates.id',$value)->first();

    //                     $product = Product::where('id',$value)->first();

    //                      //dd($product);
    //                     if($product){
    //                         $output .='<tr> 
                                        
    //                                     <td><input type="hidden" name="pro_name[]" class="p_id" id="p_id" value="'.$product->id.'">'.$product->name.'</td>
    //                                     <td> 
    //                                         <div class="input-group spinner" data-trigger="spinner">
    //                                               <input type="text" class="form-control text-center spinner qnt"  id="'.$product->id.'" value="'.$quantity[$key].'" data-rule="quantity" name="qnt[]">
    //                                               <div class="input-group-addon">
    //                                                 <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-caret-up"></i></a>
    //                                                 <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-caret-down"></i></a>
    //                                               </div>
    //                                         </div>
    //                                     </td>
    //                                     <td><input type="text" name="u_price[]" value="'.$product->price.'" readonly="" class="form-control u_price"></td>
    //                                     <td><input type="text" name="in_dis[]" value="0" class="form-control in_dis"></td>
    //                                     <td><input type="text" name="vat[]" value="0" class="form-control vat"></td>
    //                                     <td><input type="text" name="s_total[]" value="'.$this->getTotalPrice($product->pat_price,0,0,$quantity[$key]).'" class="form-control s_total"></td>
    //                                     <td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>
    //                                 </tr>';
    //                     }
    //                 }else{
    //                    // dd($key);
    //                     // $product =  DB::table('pack_cates')
    //                     // ->join('packages', 'pack_cates.id', '=', 'packages.pacate_id')->where('pack_cates.id',$value)->first();

    //                     $product = Product::where('id',$value)->first();

    //                     // dd($product);
    //                     if($product){
    //                         $output .='<tr>
                            
                                    
    //                                 <td><input type="hidden" name="pro_name[]" class="p_id" id="p_id" value="'.$product->id.'">'.$product->name.'</td>
    //                                 <td> 
    //                                             <div class="input-group spinner" data-trigger="spinner">';
    //                                                 if(sizeof($quantity) == sizeof($task)){
    //                                                     $output .='<input type="text" class="form-control text-center spinner qnt"  id="'.$product->id.'" value="'.$quantity[$key].'" data-rule="quantity" name="qnt[]">' ;
    //                                                 }else{
    //                                                     $output .='<input type="text" class="form-control text-center spinner qnt"  id="'.$product->id.'" value="1" data-rule="quantity" name="qnt[]">';
    //                                                 }
                                                      
    //                                                   $output .='<div class="input-group-addon">
    //                                                     <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-caret-up"></i></a>
    //                                                     <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-caret-down"></i></a>
    //                                                   </div>
    //                                             </div>
    //                                         </td>
    //                                 <td><input type="text" name="u_price[]" value="'.$product->price.'" readonly="" class="form-control u_price"></td>
    //                                 <td><input type="text" name="in_dis[]" value="0" class="form-control in_dis"></td>
    //                                 <td><input type="text" name="vat[]" value="0" class="form-control vat"></td>';
    //                                 if(sizeof($quantity) == sizeof($task)){
    //                                     $output .='<td><input type="text" name="s_total[]" value="'.$this->getTotalPrice($product->pat_price,0,0,$quantity[$key]).'" class="form-control s_total"></td>';
    //                                 }else{
    //                                     $output .= '<td><input type="text" name="s_total[]" value="'.$this->getTotalPrice($product->pat_price,0,0,1).'" class="form-control s_total"></td>';
    //                                 }
                                    
    //                                 $output .='<td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>
    //                             </tr>';
    //                     }
    //                 }
    //             }  
    //         }
    //         else{
    //             // $product =  DB::table('pack_cates')
    //             //         ->join('packages', 'pack_cates.id', '=', 'packages.pacate_id')->where('pack_cates.id',$request->id)->first();

    //             $product = Product::where('id',$request->id)->first();

    //            // dd($product);

    //             if($product){
    //                 $output .='<tr>
                    
                            
    //                         <td><input type="hidden" name="pro_name[]" class="p_id" id="p_id" value="'.$product->id.'">'.$product->name.'</td>
    //                         <td> 
    //                                     <div class="input-group spinner" data-trigger="spinner">
    //                                           <input type="text" class="form-control text-center spinner qnt" id="'.$product->id.'" value="1" data-rule="quantity" name="qnt[]">
    //                                           <div class="input-group-addon">
    //                                             <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-caret-up"></i></a>
    //                                             <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-caret-down"></i></a>
    //                                           </div>
    //                                     </div>
    //                                 </td>
    //                         <td><input type="text" name="u_price[]" value="'.$product->sale_price.'" readonly="" class="form-control u_price"></td>
    //                         <td><input type="text" name="in_dis[]" value="0" class="form-control in_dis"></td>
    //                         <td><input type="text" name="vat[]" value="0" class="form-control vat"></td>
    //                         <td><input type="text" name="s_total[]" value="'.$this->getTotalPrice($product->pat_price,0,0,1).'" class="form-control s_total"></td>
    //                         <td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>
    //                     </tr>';
    //             }
    //         }
            
    //         return Response($output);
    //     }
    // }
   

    // private function getTotalPrice($sale_price,$discount,$tax,$qnt){
    //     $amount =  ($qnt*$sale_price) - ($qnt*$sale_price*$discount)/100;
        
    //     $sstotal = (100+$tax)/100;
    //     $stotal = $amount*$sstotal;
    //     return $stotal;
    // }

    public function store(Request $request, Stock $stock)
    {

        $this->validate($request, [
            'c_name' => 'required',
            's_name' => 'required',
            'pro_name' => 'required',
            'qnt' => '',
            'u_price' => '',
            'in_dis' => '',
            'vat' => '',
            's_total' => '',
            'discount' => '',
            'ntotal' => '',
            'payment' => '',
            'due' => ''
            ],
            [
            'pro_name.required' => 'Product name munt be input!',
            'qnt.required' => 'Quantity must be input!',
            'qnt.integer' => 'Quantity must be integer!',
            'u_price.required' => 'Unit price must be input!'
            ]);

        
        $sale = new Sale;

        $sale->customer_id = $request->c_name;
        $sale->supplier_id = $request->s_name;
        $sale->st_discount = $request->discount;
        $sale->stotal_amount = $request->ntotal;
        $sale->spayment = $request->payment;
        $sale->sdue = $request->due;
        $sale->user_id  = Auth::user()->id;
        $sale->outlet_id  = Auth::user()->outlet_id;
        $sale->counter_id  = Auth::user()->counter_id;
        $squantity = $request->qnt;

        $sprice = $request->u_price; 
        $sdiscount = $request->in_dis;
        $svat = $request->vat;
        $sstotal = $request->s_total;
        if($sale->save()){

            foreach ($request->pro_name as $key => $product) {
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
               // dd($stock);
                if($stock){
                    $stock->quantity -= $squantity[$key];
                    $stock->save();
                    auth()->user()->notify(new ProductStock($stock));
                }
            }

        }

        //auth()->user()->notify(new ProductStock($stock));

        return redirect()->route('sales.show', $sale->id);
    }



    
    public function show($id)
    {

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
