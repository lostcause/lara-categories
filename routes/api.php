<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'cors'], function(){
    Route::resource('/category', 'API\CategoryController');
});