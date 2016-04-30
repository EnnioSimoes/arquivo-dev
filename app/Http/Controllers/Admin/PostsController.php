<?php

namespace App\Http\Controllers\Admin;

use App\Model\Categoria;
use App\Model\Post;
use App\Model\Site;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostsController extends CrudController
{
    public $posts;
    public $categorias;

    public function __construct(Request $request, PostService $service, Post $posts, Categoria $categorias, Site $site)
    {
        parent::__construct($request);

        $this->data['titulo'] = 'Posts';
        $this->categorias = $categorias;
        $this->sites = $site;
        $this->model = $posts;
        $this->service = $service;
        $this->route = 'admin.posts';
        $this->buscar_em = 'titulo';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = $this->categorias->lists('nome', 'id');
        $sites = $this->sites->lists('nome', 'id');
        $titulo = 'Post';
        $descricao = 'Criar Novo Post';
        $usuario_logado = $this->data['usuario_logado'];

        return view($this->route . '.create', compact('usuario_logado', 'categorias', 'sites', 'titulo', 'descricao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $destino = 'assets/images/posts/';
        $data = $this->service->cropImage($request, $destino);

        if ($this->model->create($data)) {
            return redirect()->route($this->route . '.index')->with('status', 'Post inserido com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o Post');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->find($id);
        $titulo = 'Post';
        $descricao = 'Editar Post';
        $usuario_logado = $this->data['usuario_logado'];

        $categorias = $this->categorias->lists('nome', 'id');
        $sites = $this->sites->lists('nome', 'id');
        return view($this->route . '.edit', compact('usuario_logado', 'data', 'categorias', 'sites', 'titulo', 'descricao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $destino = 'assets/images/posts/';
        $data = $this->service->cropImage($request, $destino);

        if ($this->model->where('id', $id)->update($data)) {
            return redirect()->route($this->route . '.index')->with('status', 'Post alterado com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o Post');
        }

    }
}
