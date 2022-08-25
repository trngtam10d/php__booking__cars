<?php

namespace App\Modules;

use Illuminate\Support\ServiceProvider as Service_Provider;
use Illuminate\Support\Facades\Storage;


class GoogleServiceProvider extends Service_Provider
{
    public function boot()
    {
        Storage::extend('google_drive', function ($app, $config) {
            // configure .env client
            $client = new \Google_Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);
            $client->setAccessToken($config['accessToken']); // note

            $service = new \Google_Service_Drive($client);
            $adapter = new \Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter($service, $config['folderId']);

            return new \League\Flysystem\Filesystem($adapter);
        });
    }

    /**
     * register server
     * */
    public function register()
    {
        //
    }
}
