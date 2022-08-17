<?php

namespace App\Providers;

/*
| Package Of the laravel
*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        * Upload image with storage link
        */
        // Storage::disk('local')->buildTemporaryUrlsUsing(function ($path, $expiration, $options) {
        //     return URL::temporarySignedRoute(
        //         'file.download',
        //         $expiration,
        //         array_merge($options, ['path' => $path])
        //     );
        // });

        /*
        * Schema run sql error
        */
        Schema::defaultStringLength(191);
    }
}
