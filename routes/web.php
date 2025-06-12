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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', function () {
    return view('layouts.master');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('categories', 'CategoryController');
    Route::get('/apiCategories', 'CategoryController@apiCategories')->name('api.categories');
    Route::get('/exportCategoriesAll', 'CategoryController@exportCategoriesAll')->name('exportPDF.categoriesAll');
    Route::get('/exportCategoriesAllExcel', 'CategoryController@exportExcel')->name('exportExcel.categoriesAll');

    Route::resource('customers', 'CustomerController');
    Route::get('/apiCustomers', 'CustomerController@apiCustomers')->name('api.customers');
    Route::post('/importCustomers', 'CustomerController@ImportExcel')->name('import.customers');
    Route::get('/exportCustomersAll', 'CustomerController@exportCustomersAll')->name('exportPDF.customersAll');
    Route::get('/exportCustomersAllExcel', 'CustomerController@exportExcel')->name('exportExcel.customersAll');

    Route::resource('sales', 'SaleController');
    Route::get('/apiSales', 'SaleController@apiSales')->name('api.sales');
    Route::post('/importSales', 'SaleController@ImportExcel')->name('import.sales');
    Route::get('/exportSalesAll', 'SaleController@exportSalesAll')->name('exportPDF.salesAll');
    Route::get('/exportSalesAllExcel', 'SaleController@exportExcel')->name('exportExcel.salesAll');

    Route::resource('suppliers', 'SupplierController');
    Route::get('/apiSuppliers', 'SupplierController@apiSuppliers')->name('api.suppliers');
    Route::post('/importSuppliers', 'SupplierController@ImportExcel')->name('import.suppliers');
    Route::get('/exportSupplierssAll', 'SupplierController@exportSuppliersAll')->name('exportPDF.suppliersAll');
    Route::get('/exportSuppliersAllExcel', 'SupplierController@exportExcel')->name('exportExcel.suppliersAll');

    Route::resource('products', 'ProductController')->only(['index']);
    Route::get('/apiProducts', 'ProductController@apiProducts')->name('api.products');

    Route::resource('productsOut', 'ProductKeluarController');
    Route::get('/apiProductsOut', 'ProductKeluarController@apiProductsOut')->name('api.productsOut');
    Route::get('/exportProductKeluarAll', 'ProductKeluarController@exportProductKeluarAll')->name('exportPDF.productKeluarAll');
    Route::get('/exportProductKeluarAllExcel', 'ProductKeluarController@exportExcel')->name('exportExcel.productKeluarAll');

    Route::resource('productsIn', 'ProductMasukController');
    Route::get('/apiProductsIn', 'ProductMasukController@apiProductsIn')->name('api.productsIn');
    Route::get('/exportProductMasukAll', 'ProductMasukController@exportProductMasukAll')->name('exportPDF.productMasukAll');
    Route::get('/exportProductMasukAllExcel', 'ProductMasukController@exportExcel')->name('exportExcel.productMasukAll');

    Route::resource('users', 'UserController');

    Route::get('api/users', 'UserController@apiUsers')->name('api.users');

    Route::resource('missing-needles', 'MissingNeedleController', ['except' => ['create', 'show']]);
    Route::get('/missing-needles/export/excel', 'MissingNeedleController@exportExcel')->name('missing-needles.export.excel');
    Route::get('/missing-needles/export/pdf', 'MissingNeedleController@exportPDF')->name('missing-needles.export.pdf');
    Route::get('/missing-needles/data', 'MissingNeedleController@getData')->name('missingNeedles.data');

    Route::resource('blunt-needles', 'BluntNeedleController', ['except' => ['create', 'show']]);
    Route::get('/blunt-needles/data', 'BluntNeedleController@getData')->name('bluntNeedles.data');
    Route::get('/blunt-needles/export/pdf', 'BluntNeedleController@exportPDF')->name('blunt-needles.export.pdf');
    Route::get('/blunt-needles/export/excel', 'BluntNeedleController@exportExcel')->name('blunt-needles.export.excel');

    Route::resource('broken-needles', 'BrokenNeedleController', ['except' => ['create', 'show']]);
    Route::get('/broken-needles/data', 'BrokenNeedleController@getData')->name('brokenNeedles.data');
    Route::get('/broken-needles/export/pdf', 'BrokenNeedleController@exportPDF')->name('broken-needles.export.pdf');
    Route::get('/broken-needles/export/excel', 'BrokenNeedleController@exportExcel')->name('broken-needles.export.excel');

    Route::resource('extra-needles', 'ExtraNeedleController', ['except' => ['create', 'show']]);
    Route::get('/extra-needles/data', 'ExtraNeedleController@getData')->name('extraNeedles.data');
    Route::get('/extra-needles/export/pdf', 'ExtraNeedleController@exportPDF')->name('extra-needles.export.pdf');
    Route::get('/extra-needles/export/excel', 'ExtraNeedleController@exportExcel')->name('extra-needles.export.excel');
});

Route::group(['middleware' => ['role:admin,staff']], function () {
    Route::resource('users', 'UserController');
    Route::get('api/users', 'UserController@apiUsers')->name('api.users');
});