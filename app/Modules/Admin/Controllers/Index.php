<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Routing\Controller;
use App\Modules\Admin\Repositories\Contract\AdminInterface;

/**
 * Controller admin
 * */
class Index extends Controller
{
    protected $adminRepository;
    public function __construct(AdminInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function index()
    {
        return view("Admin::index", [
            'all' => $this->adminRepository->__getData(),
        ]);
    }

    private function _setData()
    {
        # code...
    }
}
