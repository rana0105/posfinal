<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
// Route::get('/dashboardcharts', 'HomeController@projectChartData');

Route::group( ['middleware' => ['auth']], function() {
	Route::get('/markAsRead', function () {
     auth()->user()->unreadNotifications->markAsRead();
     
	});
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'Backend\PermissionController');
    Route::resource('posts', 'PostController');

    Route::resource('procategoies', 'Backend\ProcategoryController');
	Route::resource('brands', 'Backend\BrandController');
	Route::resource('paccates', 'Backend\PackCateController');
	Route::resource('suppliers', 'Backend\SupplierController');
	Route::resource('customertypes', 'Backend\CustomertypeController');
	Route::resource('customers', 'Backend\CustomerController');
	Route::resource('products', 'Backend\ProductController');
	Route::get('barcode', 'Backend\ProductController@barcode');

	// Purchase, Sale  and Stock.....
	Route::resource('purchases', 'Backend\PurchaseController');
	Route::resource('backproducts', 'Backend\BackProductController');
	Route::resource('stocks', 'Backend\StockController');
	Route::get('/livenotification', 'Backend\StockController@getProductid');
	// Route::get('/shownotification', 'Backend\StockController@getProductnoti');

	Route::resource('sales', 'Backend\SaleController');
	Route::get('/changeData', 'Backend\SaleController@changeData');

	Route::resource('psales', 'Backend\PsaleController');

	Route::get('/loadProduct', 'Backend\PsaleController@loadProduct');
	Route::get('/checkQuantity', 'Backend\PsaleController@checkQuantity');
	Route::get('/addToCart', 'Backend\PsaleController@addToCart');

	Route::get('products-search', 'Backend\PsaleController@productSearch');

	Route::get('/loadPackage', 'Backend\PsaleController@loadPackage');
	Route::get('/checkPackageQuantity', 'Backend\PsaleController@checkPackageQuantity');
	Route::get('/addPacakge', 'Backend\PsaleController@addPacakge');

	Route::get('getSaleInvoice', 'Backend\PsaleController@getSaleInvoice');

	Route::resource('packages', 'Backend\PackageController');

	// Route::resource('/loadPackage', 'Backend\PackageController@loadPackage');

	Route::resource('packagesales', 'Backend\PackagesaleController');


	Route::resource('settings', 'Backend\SettingController');

	Route::resource('paymethods', 'Backend\PaymethodController');

	Route::resource('expenses', 'Backend\ExpenseController');

	Route::resource('excategories', 'Backend\ExcategoryController');

	Route::resource('outlets', 'Backend\OutletController');

	// System setting show

	// Route::get('/shopname', 'HomeController@shopname');

	// Report for POS.......
	Route::get('/purchasereport', 'Backend\ReportController@purchaseReport');
	Route::get('/purchasereportcall', 'Backend\ReportController@purchaseReportcall');
	Route::get('/salereport', 'Backend\ReportController@saleReport');
	Route::get('/salereportcall', 'Backend\ReportController@saleReportcall');
	Route::get('/expensereport', 'Backend\ReportController@expenseReport');
	Route::get('/expensereportcall', 'Backend\ReportController@expenseReportcall');

	Route::get('salereportoutlet', 'Backend\ReportController@getsaleReportoutlet');

	Route::post('salereportoutlet', 'Backend\ReportController@postsaleReportoutlet');

	Route::post('reportoutlet', 'Backend\ReportController@postReportoutlet');

	Route::post('showInvoice', 'Backend\ReportController@postSaleid');

	Route::post('saleAmount', 'Backend\ReportController@postSaledate');

	Route::post('saleOutlet', 'Backend\ReportController@postOutlet');



});
