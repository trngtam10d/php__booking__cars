<?php

namespace App\Modules\Admin\Repositories\Contract;

/**
 * @extends parent<T> Request
 * class
 * */

use App\Modules\Admin\Requests\RequestAdmin;
use App\Modules\Admin\Requests\RequestAds;
use Illuminate\Support\Facades\Request;

/**
 * Interface Admin
 * */

interface InterfaceAdmin
{
    /**
     * @var mixed
     * data admin
     */
    public function geAllDataAdmin();

    public function getSignIn(RequestAdmin $request);
    /**
     * @abstract
     * Data Ads cover
     * */
    public function geAllDataAds();
    public function setStoreAds(RequestAds $request);
}
