<?php
namespace App\Modules\Admin\Controllers;

use Illuminate\Routing\Controller;

/**
 * Controller admin
 * */ 
class Index extends Controller
{
    public function index()
    {
        return view("Admin::index");
    }
}