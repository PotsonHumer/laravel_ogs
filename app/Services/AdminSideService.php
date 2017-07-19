<?php

namespace App\Services;

use Yish\Generators\Foundation\Service\Service;

class AdminSideService extends Service
{

    public $aside = [];

    public function assign($primary,$secondary=false)
    {
        $this->aside[0] = $primary;

        if($secondary) $this->aside[1] = $secondary;
    }


    public function output($views=[])
    {
        list($primary,$secondary) = $this->aside;

        $views['admin_aside_'.$primary] = 'open';
        $views['admin_aside_'.$primary.'_'.$secondary] = 'active';

        return $views;
    }
}
