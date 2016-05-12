<?php

namespace App\Model;

use Zizaco\Entrust\EntrustPermission;

class Resource extends EntrustPermission
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    public function permissions()
    {
        return $this->belongsToMany('App\Model\Permission');
    }
}
