<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Menu extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'titulo',
        'slug',
        'ativo',
        'estrutura'
    ];

    public $timestamps = false;

}
