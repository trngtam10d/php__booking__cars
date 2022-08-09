<?php

namespace App\Modules\Admin\Repositories\Contract;

/**
 * @extends parent<T> Request
 * class
 * */

use App\Modules\Admin\Requests\RequestAds;

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

    /**
     * @abstract
     * Data Ads cover
     * */
    public function geAllDataAds();
    public function setStoreAds(RequestAds $request);
}
