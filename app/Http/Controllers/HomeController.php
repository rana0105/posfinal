<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Sale;
use App\Expense;
use App\Purchase;
use App\Setting;
use Auth;
use DB;
use Charts;
use App\Notifications\ProductStock;
//use Database;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $data = Purchase::select(DB::raw('month(purchases.created_at) as month'), DB::raw('SUM(purchases.payment) as aggregates'))->groupBy(DB::raw('month(purchases.created_at)'))->get();
        
      $purchases = Charts::create('line', 'highcharts')
            ->title('Purchase Statistics')
            ->elementLabel('Purchase Statistics')
            ->dimensions(550, 400)
            ->responsive(false)
            ->labels($data->pluck('month'))
            ->values($data->pluck('aggregates'));

      $data = Expense::select(DB::raw('month(expenses.created_at) as month'), DB::raw('SUM(expenses.ex_amount) as aggregates'))->groupBy(DB::raw('month(expenses.created_at)'))->get();

      $data = Sale::select(DB::raw('date(sales.created_at) as date'), DB::raw('SUM(sales.spayment) as aggregates'))->groupBy(DB::raw('date(sales.created_at)'))->get();
        
      $sales = Charts::create('bar', 'highcharts')
            ->title('Sale Statistics')
            ->elementLabel('Sale Statistics')
            ->dimensions(1140, 400)
            ->responsive(false)
            ->labels($data->pluck('date'))
            ->values($data->pluck('aggregates'));

      $data = Expense::select(DB::raw('date(expenses.created_at) as date'), DB::raw('SUM(expenses.ex_amount) as amount'))->groupBy(DB::raw('date(expenses.created_at)'))->get();
      //dd($data);
      $expense = Charts::create('line', 'highcharts')
               ->title('Expense Statistics')
               ->elementLabel('Expense Statistics')
               ->dimensions(550, 400)
               ->responsive(false)
               ->labels($data->pluck('date'))
               ->values($data->pluck('amount'));

      $shop = DB::table('settings')->pluck('shop_name');
      $logo = DB::table('settings')->pluck('logo');
      $copy = DB::table('settings')->pluck('copy');

          return view('dashboard')->withPurchases($purchases)->withSales($sales)->withExpense($expense)->withShop($shop)->withLogo($logo)->withCopy($copy);
    }

}
