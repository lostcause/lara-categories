<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'cors'], function(Router $router){
    $router->resource('/category', 'API\CategoryController');
});