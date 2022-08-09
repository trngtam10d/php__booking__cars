<?php

namespace App\Modules\Admin\Repositories\Eloquent;

/**
 * Class Models
 * */

use App\Modules\Admin\Models\Admin;
use App\Modules\Admin\Models\Ads;

/**
 * Interface Main
 * */

use App\Modules\Admin\Repositories\Contract\InterfaceAdmin;
use App\Modules\Admin\Requests\RequestAds;

class Eloquent implements InterfaceAdmin
{
    /**
     * @var string data
     */
    public function geAllDataAdmin()
    {
        return Admin::all();
    }

    /**
     * Ads cover
     * */
    public function geAllDataAds()
    {
        return Ads::all();
    }
    public function setStoreAds(RequestAds $request)
    {
        $data = $request->all();
        if ($request->upload) {
            $data['photo'] = 'http://localhost/php__booking/public/img/thumbnail/' . $request->upload->getClientOriginalName();
            $request->upload->move('public/img/thumbnail', $request->upload->getClientOriginalName());
        }
        $countActive = Ads::where('status', 'on')->count();
        if ($countActive == 1) {
            $data['status'] = "off";
        }
        return Ads::create($data);
    }

    public static function setUrl()
    {
        $isUrl = $_SERVER['HTTPS'] ? 'https://' : 'http://';
        $isUrl .= $_SERVER['HTTP_HOST'];
        $isUrl .= $_SERVER['REQUEST_URI'];

        return $isUrl;
    }
}
