<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/supplier/add', function () {
    return view('/supplier/add-supplier');
});*/
/*Route::get('/supplier', function () {
    return view('/supplier/list-supplier');
});*/
/*Route::get('/supplier/details', function () {
    return view('/supplier/details-supplier');
});*/
Route::get('/charge/add', function () {
    return view('/charge/add-charge');
});


Route::get('/invoices/add', function () {
    return view('/invoices/add-invoice');
});
Route::get('/invoices/edit', function () {
    return view('/invoices/edit-invoice');
});
Route::get('/invoices', function () {
    return view('/invoices/list-invoices');
});
Route::get('/invoices/payment/add', function () {
    return view('/invoices/add-payment');
});
Route::get('/invoices/details', function () {
    return view('/invoices/details-invoice');
});
/*Route::get('/invoices/print', function () {
    return view('/invoices/print-invoice');
});*/

Route::get('/folder/print', function () {
    return view('/folder/print-folder');
});
Route::get('/404', function () {
    return view('/errors/404');
});
Route::get('/folder/files/add', function () {
    return view('/folder/files/add-files');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'HomeController@index');

    //Routes For Google Auth
    Route::get('auth/google', 'Auth\AuthController@redirectToProvider');
    Route::get('google/auth', 'Auth\AuthController@handleProviderCallback');


    //Routes For Clients
    Route::get('/clients', 'ClientController@index');
    Route::get('/clients/add', 'ClientController@create');
    Route::post('/clients/add', 'ClientController@store');
    Route::get('/clients/edit/{id}', 'ClientController@edit');
    Route::post('/clients/edit/{id}', 'ClientController@update');
    Route::get('/clients/{id}', 'ClientController@show');
    Route::get('/clients/delete/{id}', 'ClientController@confirmDelete');
    Route::get('/clients/destroy/{id}', 'ClientController@destroy');
    Route::post('/clients/find_clients/', 'ClientController@findClient');

    //Routes For Folders
    Route::get('/folder', 'FolderController@index');
    Route::get('/folder/add', 'FolderController@create');
    Route::get('/folder/{id}', 'FolderController@show');
    Route::get('/folder/edit/{id}', 'FolderController@edit');
    Route::get('/folder/article/remove/{id}', 'FolderController@removeArticle');
    Route::get('/folder/delete/{id}', 'FolderController@confirmDelete');
    Route::get('/folder/print/{id}', 'FolderController@printFolder');

    //Routes For Martime Folders
    Route::get('/folder/maritime/', 'MaritimeFolderController@index');
    Route::get('/folder/maritime/add', 'MaritimeFolderController@create');
    Route::post('/folder/maritime/add', 'MaritimeFolderController@store');
    Route::get('/folder/maritime/edit/{id}', 'MaritimeFolderController@edit');
    Route::post('/folder/maritime/edit/{id}', 'MaritimeFolderController@update');
    Route::post('/folder/maritime/{id}', 'MaritimeFolderController@show');
    Route::get('/folder/maritime/delete/{id}', 'MaritimeFolderController@destroy');

    //Routes For Arial Folders
    Route::get('/folder/arial/', 'ArialFolderController@index');
    Route::get('/folder/arial/add', 'ArialFolderController@create');
    Route::post('/folder/arial/add', 'ArialFolderController@store');
    Route::get('/folder/arial/edit/{id}', 'ArialFolderController@edit');
    Route::post('/folder/arial/edit/{id}', 'ArialFolderController@update');
    Route::post('/folder/arial/{id}', 'ArialFolderController@show');
    Route::get('/folder/arial/delete/{id}', 'ArialFolderController@destroy');

    //Routes For Road Folders
    Route::get('/folder/road/', 'RoadFolderController@index');
    Route::get('/folder/road/add', 'RoadFolderController@create');
    Route::post('/folder/road/add', 'RoadFolderController@store');
    Route::get('/folder/road/edit/{id}', 'RoadFolderController@edit');
    Route::post('/folder/road/edit/{id}', 'RoadFolderController@update');
    Route::post('/folder/road/{id}', 'RoadFolderController@show');
    Route::get('/folder/road/delete/{id}', 'RoadFolderController@destroy');

    //Route For Logistic Folders
    Route::get('/folder/logistic/', 'LogisticFolderController@index');
    Route::get('/folder/logistic/add', 'LogisticFolderController@create');
    Route::post('/folder/logistic/add', 'LogisticFolderController@store');
    Route::get('/folder/logistic/edit/{id}', 'LogisticFolderController@edit');
    Route::post('/folder/logistic/edit/{id}', 'LogisticFolderController@update');
    Route::post('/folder/logistic/{id}', 'LogisticFolderController@show');
    Route::get('/folder/logistic/delete/{id}', 'LogisticFolderController@destroy');

    //Routes For Transit Folders
    Route::get('/folder/transit/', 'TransitFolderController@index');
    Route::get('/folder/transit/add', 'TransitFolderController@create');
    Route::post('/folder/transit/add', 'TransitFolderController@store');
    Route::get('/folder/transit/edit/{id}', 'TransitFolderController@edit');
    Route::post('/folder/transit/edit/{id}', 'TransitFolderController@update');
    Route::post('/folder/transit/{id}', 'TransitFolderController@show');
    Route::get('/folder/transit/delete/{id}', 'TransitFolderController@destroy');

    //Routes For Files
    Route::get('/file/add/{id}', 'FileController@create');
    Route::post('/file/add/{id}', 'FileController@store');
    Route::post('/file/delete', 'FileController@deleteFile');

    //Routes For Invoices
    Route::get('/invoices', 'InvoiceController@index');
    Route::get('/invoices/add/{folder_id}/{id_type}', 'InvoiceController@create');
    Route::post('/invoices/add/', 'InvoiceController@store');
    Route::get('/invoices/{id}', 'InvoiceController@show');
    Route::get('/invoices/edit/{id}', 'InvoiceController@edit');
    Route::post('/invoices/edit/{id}', 'InvoiceController@update');
    Route::get('/invoices/payment/{id}', 'InvoiceController@payment');
    Route::post('/invoices/payment/{id}', 'InvoiceController@pay');
    Route::get('/invoices/print/{id}', 'InvoiceController@printInvoice');
    Route::get('/invoices/delete/{id}', 'InvoiceController@confirmDelete');
    Route::get('/invoices/destroy/{id}', 'InvoiceController@destroy');
    Route::post('/invoices/update_state/{id}', 'InvoiceController@updateState');
    Route::get('/invoices/payments/edit/{id}', 'InvoiceController@editInvoicePayment');
    Route::post('/invoices/payments/edit/{id}', 'InvoiceController@updateInvoicePayment');
    Route::get('/invoices/payments/delete/{id}', 'InvoiceController@destroyInvoicePayment');
    Route::get('/invoices/line/delete', 'InvoiceController@deleteInvoiceLine')->name('invoice.delete.line');

    //Routes For Suppliers
    Route::get('/supplier', 'SupplierController@index');
    Route::get('/supplier/add', 'SupplierController@create');
    Route::post('/supplier/add', 'SupplierController@store');
    Route::get('/supplier/edit/{id}', 'SupplierController@edit');
    Route::post('/supplier/edit/{id}', 'SupplierController@update');
    Route::get('/supplier/{id}', 'SupplierController@show');
    Route::get('/supplier/delete/{id}', 'SupplierController@confirmDelete');
    Route::get('/supplier/destroy/{id}', 'SupplierController@destroy');
    Route::post('/supplier/find/', 'SupplierController@getSupplierByName');

    //Routes For Charges
    Route::get('/charges/add/{id}', 'ChargeController@create');
    Route::post('/charges/add/{id}', 'ChargeController@store');
    Route::get('/charges/edit/{id}', 'ChargeController@edit');
    Route::post('/charges/edit/{id}', 'ChargeController@update');
    Route::get('/charges/delete/{id}', 'ChargeController@destroy');


    Route::get('/footer', function () {
        return view('/footer/footer');
    });

    //Routes For Notices
    Route::get('/notice/prior/{id}', 'NoticeController@printPriorNotice');
    Route::get('/notice/boarding/{id}', 'NoticeController@printBoardingNotice');
    Route::get('/notice/arrival/{id}', 'NoticeController@printArrivalNotice');
});
