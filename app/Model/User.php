<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
//use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
    //use Illuminate\Foundation\Auth\Access\Authorizable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class User extends Model implements Transformable, AuthenticatableContract,
//AuthorizableContract,
CanResetPasswordContract
{
    use TransformableTrait,
    Authenticatable,
    //Authorizable,
    CanResetPassword;
    use EntrustUserTrait; // add this trait to your user model

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'name',
            'sobrenome',
            'email',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
            'ativo',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function site() {
            return $this->hasMany(Site::class);
    }

    public function post() {
            return $this->hasMany(Post::class);
    }

    public function categoria() {
            return $this->hasMany(Categoria::class);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role');
    }

}
