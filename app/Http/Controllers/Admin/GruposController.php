<?php

namespace App\Http\Controllers\Admin;

use App\Model\Grupo;
use Illuminate\Http\Request;

class GruposController extends CrudController
{
    public $data = [];
    public $categorias;

    public function __construct(Request $request, Grupo $grupos)
    {
        parent::__construct($request);

        $this->data['titulo'] = 'Grupos';
        $this->model = $grupos;
        $this->route = 'admin.grupos';
        $this->buscar_em = 'nome';
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $data = $request->all();
    //     unset($data['_token']);
    //
    //     if ($data['slug'] == '') {
    //         $data['slug'] = str_slug($data['nome']);
    //     } else {
    //         $data['slug'] = str_slug($data['slug']);
    //     }
    //
    //     if ($this->model->create($data)) {
    //         return redirect()->route($this->route . '.index')->with('status', 'Post inserido com sucesso!');
    //     } else {
    //         return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o Post');
    //     }
    // }
    //
    // public function update(Request $request, $id)
    // {
    //     $data = $request->all();
    //     unset($data['_token']);
    //
    //     if ($data['slug'] == '') {
    //         $data['slug'] = str_slug($data['nome']);
    //     } else {
    //         $data['slug'] = str_slug($data['slug']);
    //     }
    //
    //     if ($this->model->where('id', $id)->update($data)) {
    //         return redirect()->route($this->route . '.index')->with('status', 'Post alterado com sucesso!');
    //     } else {
    //         return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o Post');
    //     }
    // }

}
