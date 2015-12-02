<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'nome'
        'link'
        'logotipo'
        'facebook'
        'youtube'
        'github'
        'googleplus'
        'twitter'
        'dt_cadastro'
        'dt_alteracao'
        'dt_exclusao'
        'cadastro_usuario_id'
        'alteracao_usuario_id'
        'exclusao_usuario_id'
        'ativo'        
    ];

    public $timestamps = false;
    
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
