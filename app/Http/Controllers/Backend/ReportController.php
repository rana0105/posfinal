<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outlet;
use App\Product;
use App\Purchase;
use App\Supplier;
use App\Stock;
use App\Customer;
use App\Sale;
use App\Account;
use App\Expense;
use App\Sinvoice;
use App\Setting;
use App\User;
use DB;

class ReportController extends Controller
{
    public function purchaseReport()
    {
        $purchases = Purchase::orderBy('id', 'ASC')->paginate(10);
        $stock = Stock::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
    	return view('backend.report.purchasereport')->withPurchases($purchases)->withShop($shop)->withCopy($copy);
    }

    public function purchaseReportcall(Request $request)
    {
        if($request->ajax()){
            $output ='';
            $formdate = $request->formdate;
            $todate = $request->todate;
            $model = Purchase::whereBetween('date', array($formdate, $todate))->get();
            
            if(sizeof($model)>0){
                
                        foreach($model as $m){
                            $output .='<tr>
                                <td>'. $m->date .'</td>
                                <td>'. $m->total_amount .'</td>
                                <td>'. $m->t_discount .'</td>
                                <td>'. $m->due .'</td>
                            </tr>';
                        }
            }else{
                $output .='No data found';
            }
            return Response($output);
        }
    }

    public function saleReport()
    {
        $sales = Sale::orderBy('id', 'ASC')->paginate(10);
        $outlet = Outlet::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');

        return view('backend.report.salereport')->withSales($sales)->withOutlet($outlet)->withShop($shop)->withCopy($copy);
    }

    public function saleReportcall(Request $request)
    {
        if($request->ajax()){
            $output ='';
            $saleoutlet = $request->saleoutlet;
            //dd($saleoutlet);
            $counter = $request->counter;
            //dd($counter);
            $dform = $request->dform;
            $dto = $request->dto;
            $model = Sale::where('outlet_id', $saleoutlet)->where('counter_id', $counter)->whereBetween('created_at', array($dform, $dto))->get();
            //dd($model);
            if(sizeof($model)>0){
                
                        foreach($model as $m){
                            $output .='<tr>
                                <td>'. $m->id .'</td>
                                <td>'. date("Y-m-d", strtotime($m->created_at)) .'</td>
                                <td>'. $m->stotal_amount .'</td>
                                <td>'. $m->st_discount .'</td>
                                <td>'. $m->sdue .'</td>
                                <td>'. $m->users->name .'</td>
                            </tr>';
                        }
            }else{
                $output .='No data found';
            }
            return Response($output);
        }
    }

    public function discountReport()
    {
    	return view('backend.report.discountreport');
    }

    public function expenseReport()
    {
        $outlet = Outlet::all();
        $expense = Expense::orderBy('id', 'ASC')->paginate(10);
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.report.expensereport')->withExpe($expense)->withOutlet($outlet)->withShop($shop)->withCopy($copy);
    }

    public function expenseReportcall(Request $request)
    {
         if($request->ajax()){
            $output ='';
            $exoutlet = $request->exoutlet;
            // dd($exoutlet);
            $formd = $request->datform;
            //dd($formd);
            $tod = $request->datdto;

            $model = Expense::where('outlet_id', $exoutlet)->whereBetween('ex_date', array($formd, $tod))->get();
           // dd($model);
            if(sizeof($model)>0){
                
                        foreach($model as $m){
                            $output .='<tr>
                                <td>'. $m->outlets->out_name .'</td>
                                <td>'. $m->ex_date .'</td>
                                <td>'. $m->ex_amount .'</td>
                            </tr>';
                        }
            }else{
                $output .='No data found';
            }
            return Response($output);
        }
    }

    public function getsaleReportoutlet(){
        $outlet = Outlet::all();
        $saleinvoice = Sale::all('id');
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.report.salereportoutlet')->withOutlet($outlet)->withSale($saleinvoice)->withShop($shop)->withCopy($copy);
    }

    public function postsaleReportoutlet(Request $request){
        $saleoutlet = $request->saleoutlet;
        $counter = $request->counter;
        if($saleoutlet != null && $counter !=null){
            $sale = Sale::where('outlet_id', $saleoutlet)->where('counter_id', $counter)->get();

            $shop = DB::table('settings')->pluck('shop_name');
            $copy = DB::table('settings')->pluck('copy');
            return view('backend.report.showsalereport')->withSale($sale)->withShop($shop)->withCopy($copy);
        }else{
            return redirect('salereportoutlet');
        }
        // $sale = Sale::where('outlet_id', $request->saleoutlet)->where('counter_id', $request->counter)->get();

        // $shop = DB::table('settings')->pluck('shop_name');
        // $copy = DB::table('settings')->pluck('copy');
        // return view('backend.report.showsalereport')->withSale($sale)->withShop($shop)->withCopy($copy);

        // $saleoutlet = $request->saleoutlet;
        // $counter = $request->counter;
        // $fromdate = $request->datefrom;
        // $todate = $request->dateto;
        //dd($counter);
        
        // if($fromdate != null && $todate !=null){
        //     $sale ='';
        //     if($saleoutlet != null && $counter == null){
        //         $sale = Sale::where('outlet_id',$saleoutlet)->where('counter_id',$counter)->whereBetween('created_at', array($fromdate, $todate))->get();
        //     }elseif($saleoutlet == null && $counter != null){
        //         $sale = Sale::where('outlet_id',$saleoutlet)->where('counter_id',$counter)->whereBetween('created_at', array($fromdate, $todate))->get();
        //     }else{
        //         $sale = Sale::whereBetween('created_at', array($fromdate, $todate))->get();
        //     }
        //     dd($sale);
        //     return view('backend.report.showsalereport')->withSale($sale);
        // }else{
            
        //     return redirect('salereportoutlet');
        // }
    }

    public function postReportoutlet(Request $request){
        $saleoutlet = $request->saleoutlet;
        if($saleoutlet != null){
            $sale = Sale::where('outlet_id', $saleoutlet)->get();

            $shop = DB::table('settings')->pluck('shop_name');
            $copy = DB::table('settings')->pluck('copy');
            return view('backend.report.showsaleoutlet')->withSale($sale)->withShop($shop)->withCopy($copy);
        }else{
            return redirect('salereportoutlet');
        }
    }

    public function postSaleid(Request $request){
        $saleid = $request->saleid;
        // $fromdate = $request->datefrom;
        // $todate = $request->dateto;

            // $salin = Sinvoice::whereBetween(DB::raw('date(`created_at`)'), array($fromdate, $todate))->get();
            // dd($salin);
           $sale = Sale::find($saleid);
            // $saleinvoice = DB::table('sales')
            // ->join('sinvoices', 'sales.id', '=', 'sinvoices.sale_id')
            // ->where('sales.id', $saleid)->get();
            $saleinvoice = Sinvoice::where('sale_id', $saleid)->get();

            $shop = DB::table('settings')->pluck('shop_name');
            $copy = DB::table('settings')->pluck('copy');
            return view('backend.report.showinvoice')->withSale($sale)->withSaleinvoice($saleinvoice)->withShop($shop)->withCopy($copy);
    }

    public function postSaledate(Request $request){
        $saleid = $request->saleid;
        $fromdate = $request->datefrom;
        $todate = $request->dateto;
        $totalsale = 0;
        $totalexpense = 0;
        $profit = 0;
            $tsalin = Sale::whereBetween(DB::raw('date(`created_at`)'), array($fromdate, $todate))->get();
            if(sizeof($tsalin)>0){
            foreach ($tsalin as $key => $value) {
                $totalsale += $value->spayment;
            }
        }
       //dd($totalsale);

       $texpen = Expense::whereBetween(DB::raw('date(`created_at`)'), array($fromdate, $todate))->get();
       if(sizeof($texpen)>0){
            foreach ($texpen as $key => $value) {
                $totalexpense += $value->ex_amount;
            }
        }
        //dd($totalexpense);

        $profit = $totalsale - $totalexpense ;

            $shop = DB::table('settings')->pluck('shop_name');
            $copy = DB::table('settings')->pluck('copy');
            return view('backend.report.showfinal')->withTotalsale($totalsale)->withTotalexpense($totalexpense)->withProfit($profit)->withFrom($fromdate)->withTo($todate)->withShop($shop)->withCopy($copy);
    }

    public function postOutlet(Request $request){
       // dd($request->all());
        $outlet = $request->outlet;
        $fromdate = $request->datefrom;
        $todate = $request->dateto;
        $totalsale = 0;
        $totalexpense = 0;
        $profit = 0;
            $tsalin = Sale::where('outlet_id', $outlet)->whereBetween(DB::raw('date(`created_at`)'), array($fromdate, $todate))->get();
           // dd($tsalin);
            if(sizeof($tsalin)>0){
            foreach ($tsalin as $key => $value) {
                $totalsale += $value->spayment;
            }
        }
       

       $texpen = Expense::where('outlet_id', $outlet)->whereBetween(DB::raw('date(`created_at`)'), array($fromdate, $todate))->get();
       //dd($texpen);
       if(sizeof($texpen)>0){
            foreach ($texpen as $key => $value) {
                $totalexpense += $value->ex_amount;
            }
        }
        //dd($totalexpense);

        $profit = $totalsale - $totalexpense ;

            $shop = DB::table('settings')->pluck('shop_name');
            $copy = DB::table('settings')->pluck('copy');
            return view('backend.report.showfinaloutlet')->withTotalsale($totalsale)->withTotalexpense($totalexpense)->withProfit($profit)->withFrom($fromdate)->withTo($todate)->withShop($shop)->withCopy($copy);
    }
}
