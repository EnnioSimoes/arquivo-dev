<?php 

namespace App\Model;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
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