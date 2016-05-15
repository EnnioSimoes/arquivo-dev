<?php

namespace App\Model;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role');
    }

    public function resources()
    {
        return $this->belongsToMany('App\Model\Resource');
    }
}
