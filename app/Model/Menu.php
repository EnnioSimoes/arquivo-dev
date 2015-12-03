<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'titulo',
        'ativo'
    ];

    public $timestamps = false;
}
