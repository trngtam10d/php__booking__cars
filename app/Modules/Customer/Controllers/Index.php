<?php

namespace App\Modules\Customer\Controllers;

use Illuminate\Routing\Controller;

/**
 * Controller Index
 * */
class Index extends Controller
{
    public function index()
    {
        return view("Customer::welcome");
    }
}
