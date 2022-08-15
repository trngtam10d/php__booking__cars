<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Routing\Controller;
use App\Modules\Admin\Repositories\Contract\InterfaceAdmin;
use App\Modules\Admin\Requests\RequestAdmin;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check()) {
            return view("Admin::index", [
                'all' => $this->adminRepository->geAllDataAdmin(),
            ]);
        }
        return redirect()->route('signin');
    }


    public function signin()
    {
        if (!Auth::check()) {
            return view("Admin::account.signin");
        }
        return redirect()->route('admin');
    }
    public function sendLogin(RequestAdmin $request)
    {
        $this->adminRepository->getSignIn($request);
    }
}
