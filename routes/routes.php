<?php 
    require_once('app.php');
    
    Route::get('/login', 'LoginController@index');
    Route::post('/login/log-into', 'LoginController@store');

    Route::get('/register', 'RegisterController@index');
    Route::post('/register/into', 'RegisterController@store');
    
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/logout', 'LogoutController@logout');
    
    Route::run();
?>