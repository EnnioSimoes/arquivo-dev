<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    public function permission()
    {
        return $this->belongsToMany('App\Model\Permission');
    }
    public function users()
    {
        return $this->belongsToMany('App\Model\user');
    }

}
