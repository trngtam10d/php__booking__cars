<?php

namespace App\Modules;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider as Service_Provider;

class GoogleServiceProvider extends Service_Provider
{
    public function boot()
    {

        //blade template

    }

    /**
     * register server
     * */
    public function register()
    {
        try {
            Storage::extend('google', function ($app, $config) {
                $options = [];
                if (!empty($config['teamDriveId'] ?? null)) {
                    $options['teamDriveId'] = $config['teamDriveId'];
                }
                $client = new \Google\Client();

                $client->setClientId($config['clientId']);
                $client->setClientSecret($config['clientSecret']);
                $client->refreshToken($config['refreshToken']);

                $service = new \Google\Service\Drive($client);
                $adapter = new \Masbug\Flysystem\GoogleDriveAdapter($service,  $config['folder'] ?? '/', $options);
                $driver  = new \League\Flysystem\Filesystem($adapter);

                return new \Illuminate\Filesystem\FilesystemAdapter($driver, $adapter);
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
