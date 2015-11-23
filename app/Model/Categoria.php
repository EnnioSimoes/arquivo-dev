<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
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
    
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
