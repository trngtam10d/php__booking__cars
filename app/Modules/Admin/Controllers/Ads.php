<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Routing\Controller;
use App\Modules\Admin\Repositories\Contract\InterfaceAdmin;
use App\Modules\Admin\Requests\RequestAds;

/**
 * Controller admin
 * */
class Ads extends Controller
{
    protected $adsRepository;
    public function __construct(InterfaceAdmin $adsRepository)
    {
        $this->adsRepository = $adsRepository;
    }

    public function index()
    {
        return view("Admin::ads.index", [
            'ads' => $this->adsRepository->geAllDataAds(),
        ]);
    }
    public function create()
    {
        return view("Admin::ads.add");
    }

    public function store(RequestAds $requestAds)
    {
        if ($this->adsRepository->setStoreAds($requestAds)) {
            request()->session()->flash('success', 'Successfully added Posts');
            return redirect()->route('ads.index');
        } else {
            request()->session()->flash('error', 'Error occurred while adding Posts');
        }
    }
}
