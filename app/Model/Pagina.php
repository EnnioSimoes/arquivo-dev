<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Pagina extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'titulo',
        'slug',
        'conteudo',
        'descricao',
        'dt_cadastro',
        'dt_alteracao',
        'dt_exclusao',
        'cadastro_usuario_id',
        'alteracao_usuario_id',
        'exclusao_usuario_id',
        'ativo'
    ];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

}
