<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItensMenu extends Model
{
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
