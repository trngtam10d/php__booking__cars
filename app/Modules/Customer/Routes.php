<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['module' => 'Customer', 'middleware' => 'web', 'namespace' => "App\Modules\Customer\Controllers"], function () 
{
    Route::get("/",  "Index@index");
});
