<?php
namespace App\Modules\Supplier\Controllers;

use Illuminate\Routing\Controller;

/**
 * Controller supplier
 * */ 
class Index extends Controller
{
    public function index()
    {
        return view("Supplier::index");
    }
}