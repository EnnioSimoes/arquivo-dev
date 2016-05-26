<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Post extends Model implements Transformable
{
    use TransformableTrait;

	protected $fillable = [
		'titulo',
		'link',
		'imagem',
		'descricao',
		'autor',
		'gostei',
		'categoria_id',
		'site_id',
		'dt_cadastro',
		'dt_alteracao',
		'dt_exclusao',
		'cadastro_usuario_id',
		'alteracao_usuario_id',
		'exclusao_usuario_id',
		'ativo',
	];

	public $timestamps = false;

	public function categoria() {
		return $this->belongsTo(Categoria::class);
	}

	public function usuario() {
		return $this->belongsTo(User::class);
	}

	public function site() {
		return $this->belongsTo(Site::class);
	}

}
