<?php 
    require_once('app.php');

    // Rotas de login
    Route::get('/login', 'LoginController@index');
    Route::post('/login/log-into', 'LoginController@store');

    // Rotas de registro
    Route::get('/register', 'RegisterController@index');
    Route::post('/register/into', 'RegisterController@store');

    // Rotas de dasboard
    Route::get('/dashboard', 'DashboardController@index');

    // Rotas de logout
    Route::get('/logout', 'LogoutController@logout');
    
    // Rotas de produto
    Route::get('/add/product', 'ProductController@index'); 

    // Rotas de categoria
    Route::get('/add/category', 'CategoryController@index');
    Route::post('/adding/category', 'CategoryController@store'); 


    Route::run();
?>