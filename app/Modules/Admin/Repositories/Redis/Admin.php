<?php

namespace App\Modules\Admin\Repositories\Redis;

use App\Modules\Admin\Repositories\Contract\AdminInterface;

class Admin implements AdminInterface
{
    public function __getData()
    {
        return 'get data';
    }

    public function __findName($name)
    {
        return 'find name ' . $name;
    }
}
