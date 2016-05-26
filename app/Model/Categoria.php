<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Categoria extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome',
        'slug',
        'dt_cadastro',
        'dt_alteracao',
        'dt_exclusao',
        'cadastro_usuario_id',
        'alteracao_usuario_id',
        'exclusao_usuario_id',
    ];

    public $timestamps = false;

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
