<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CategoriaRepository;
// use App\Model\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends CrudController
{
    public $data = [];
    public $categorias;

    public function __construct(Request $request, CategoriaRepository $categorias)
    {
        parent::__construct($request);

        $this->data['titulo'] = 'Categorias';
        $this->repository = $categorias;
        $this->route = 'admin.categorias';
        $this->buscar_em = 'nome';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        if ($data['slug'] == '') {
            $data['slug'] = str_slug($data['nome']);
        } else {
            $data['slug'] = str_slug($data['slug']);
        }

        if ($this->repository->create($data)) {
            return redirect()->route($this->route . '.index')->with('status-ok', 'Post inserido com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status-erro', 'Ocorreu um erro ao inserir o Post');
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);

        if ($data['slug'] == '') {
            $data['slug'] = str_slug($data['nome']);
        } else {
            $data['slug'] = str_slug($data['slug']);
        }

        if ($this->repository->update($data, $id)) {
            return redirect()->route($this->route . '.index')->with('status-ok', 'Post alterado com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status-erro', 'Ocorreu um erro ao inserir o Post');
        }
    }

}
