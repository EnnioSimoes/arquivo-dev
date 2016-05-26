<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ItensMenu extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'menu_id',
        'titulo',
        'link',
        'ativo',
    ];

    public $timestamps = false;

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

}
