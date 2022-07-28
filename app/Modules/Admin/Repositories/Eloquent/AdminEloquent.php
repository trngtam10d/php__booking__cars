<?php

namespace App\Modules\Admin\Repositories\Eloquent;

use App\Modules\Admin\Models\Admin_Model;
use App\Modules\Admin\Repositories\Contract\AdminInterface;

class AdminEloquent implements AdminInterface
{
    /**
     * @var string data
     */
    public function __getData()
    {
        return Admin_Model::all();
    }

    public function __findName($name = null)
    {
        return [];
    }
}
