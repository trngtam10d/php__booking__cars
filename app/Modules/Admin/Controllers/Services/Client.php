<?php

namespace App\Modules\Admin\Controllers\Service;

use Illuminate\Support\Facades\Storage;

/**
 * Controller admin
 * */
class Client
{
    public $driver = Storage::disk('google_drive');
    public $dir = "/";
    public $recursive = false;
    public $contents = collect($driver->listContents($dir, $recursive));
}
