<?php

namespace App;

use App\commonModel;

class DomainModel extends commonModel
{
    /**
    * 站點相關模組
    *
    * 
    */

    protected $table = 'domain';
    protected $fillable = ['name','ssl'];
    #public    $timestamps = false;

    public function site()
    {
        return $this->belongsTo('App\SiteModel', 'siteid', 'id');
    }
}
