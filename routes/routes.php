<?php
    require_once('app.php');

    // Rotas de login
    Route::get('/login', 'LoginController@index');
    Route::post('/login/log-into', 'LoginController@store');

    // Rotas de dasboard
    Route::get('/dashboard', 'DashboardController@index');

    // Rotas de logout
    Route::get('/logout', 'LogoutController@logout');

    // Rotas de produto
    Route::get('/product', 'ProductController@show');
    Route::get('/add/product', 'ProductController@index');
    Route::post('/adding/product', 'ProductController@store');
    Route::post('/getProducts', 'ProductController@getProducts');
    Route::post('/getProduct', 'ProductController@getProduct');
    Route::get('/edit/product', 'ProductController@edit');
    Route::post('/update/product', 'ProductController@update');
    Route::get('/delete/product', 'ProductController@delete');

    // Rotas de categoria
    Route::get('/category', 'CategoryController@show');
    Route::get('/add/category', 'CategoryController@index');
    Route::post('/adding/category', 'CategoryController@store');
    Route::get('/edit/category','CategoryController@edit');
    Route::post('/update/category','CategoryController@update');
    Route::get('/delete/category', 'CategoryController@delete');

    // Rotas de cliente
    Route::get('/client','ClientController@show');
    Route::get('/add/client','ClientController@index');
    Route::post('/adding/client', 'ClientController@store');
    Route::post('/adding/sale-client', 'ClientController@addSaleClient');
    Route::get('/getAllClients', 'ClientController@getAllClients');
    Route::post('/getClient','ClientController@getClient');
    Route::post('/getClientById','ClientController@getClientById');
    Route::get('/edit/client', 'ClientController@edit');
    Route::post('/update/client','ClientController@update');
    Route::get('/delete/client', 'ClientController@delete');

    // Rotas de venda
    Route::get('/add/sale','SaleController@index');
    Route::post('/adding/sale', 'SaleController@store');
    Route::get('/sale','SaleController@show');
    Route::post('/getSale', 'SaleController@getSale');
    Route::post('/sale/getProducts', 'SaleController@getProducts');

    //Rotas de funcionário
    Route::get('/employee', 'EmployeeController@show');
    Route::get('/add/employee','EmployeeController@index');
    Route::post('/adding/employee', 'EmployeeController@store');
    Route::get('/edit/employee', 'EmployeeController@edit');
    Route::post('/update/employee','EmployeeController@update');
    Route::get('/delete/employee', 'EmployeeController@delete');

    //Rotas de forncedores
    Route::get('/provider', 'ProviderController@show');
    Route::get('/add/provider', 'ProviderController@index');
    Route::post('/adding/provider', 'ProviderController@store');
    Route::post('/getProvider', 'ProviderController@getProvider');
    Route::get('/edit/provider', 'ProviderController@edit');
    Route::post('/update/provider', 'ProviderController@update');
    Route::get('/delete/provider', 'ProviderController@delete');

    Route::run();
?>
