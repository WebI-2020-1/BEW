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
    Route::get('/add/product', 'ProductController@index');
    Route::post('/adding/product', 'ProductController@store');
    Route::post('/getProducts','ProductController@getProducts');

    // Rotas de categoria
    Route::get('/add/category', 'CategoryController@index');
    Route::post('/adding/category', 'CategoryController@store');

    // Rotas de cliente
    Route::get('/add/client','ClientController@index');
    Route::post('/adding/client', 'ClientController@store');
    Route::post('/adding/sale-client', 'ClientController@addSaleClient');
    Route::get('/getAllClients', 'ClientController@getAllClients');

    // Rotas de venda
    Route::get('/add/sale','SaleController@index');
    Route::post('/adding/sale', 'SaleController@store');
    Route::get('/sale','SaleController@show');
    Route::post('/getSale', 'SaleController@getSale');
    Route::post('/sale/getProducts', 'SaleController@getProducts');

    //Rotas de funcionário
    Route::get('/add/employee','EmployeeController@index');
    Route::post('/adding/employee', 'EmployeeController@store');

    Route::run();
?>
