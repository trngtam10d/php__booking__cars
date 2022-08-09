<?php

use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Admin', 'middleware' => 'web', 'namespace' => "App\Modules\Admin\Controllers"], function () {

    Route::group(["prefix" => "admin"], function () {
        Route::get("/",  "Index@index")->name('admin');

        Route::group(["prefix" => "ads"], function () {
            Route::get("/",  "Ads@index")->name('ads.index');
            Route::get("/add",  "Ads@create")->name('ads.add');
            Route::post("/save",  "Ads@store")->name('ads.store');
        });
    });
});
