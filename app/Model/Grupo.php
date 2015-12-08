<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'nome',
    ];

    public $timestamps = false;
   
    public function usuario()
    {
        return $this->hasMany(User::class);
    }
}
