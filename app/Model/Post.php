<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titulo',
        'link',
        'imagem',
        'descricao',
        'autor',
        'gostei',
        'categoria_id',
        'dt_cadastro',
        'dt_alteracao',
        'dt_exclusao',
        'cadastro_usuario_id',
        'alteracao_usuario_id',
        'exclusao_usuario_id',
        'ativo'
    ];

    public $timestamps = false;
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
