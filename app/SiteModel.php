<?php

namespace App;

use App\commonModel;

class SiteModel extends commonModel
{
    /**
    * 站點相關模組
    *
    * 
    */

    protected $table  = 'site';
    public    $timestamps = false;

    public function domain()
    {
        return $this->hasMany('App\DomainModel', 'siteid', 'id');
    }
}
