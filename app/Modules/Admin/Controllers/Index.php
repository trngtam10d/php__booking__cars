<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Routing\Controller;
use App\Modules\Admin\Repositories\Contract\InterfaceAdmin;
use App\Modules\Admin\Requests\RequestAdmin;


/**
 * Controller admin
 * */
class Index extends Controller
{
    protected $adminRepository;
    public function __construct(InterfaceAdmin $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function index()
    {
        return view("Admin::index", [
            'all' => $this->adminRepository->geAllDataAdmin(),
        ]);
    }


    public function signin()
    {
        return view("Admin::account.signin");
    }
    public function sendLogin(RequestAdmin $request)
    {
        $this->adminRepository->getSignIn($request);
    }
}
