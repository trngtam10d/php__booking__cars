<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['module' => 'Supplier', 'middleware' => 'web', 'namespace' => "App\Modules\Supplier\Controllers"], function () 
{
    Route::get("/supplier",  "Index@index");
});
