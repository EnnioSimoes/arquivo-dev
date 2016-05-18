<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class CrudController extends Controller
{
    protected $service = null;
    protected $model = null;
    protected $route = null;
    protected $titulo;
    protected $data = [];
    protected $buscar_em = null;

    public function __construct(Request $request)
    {
        // Exibe dados do usuario autenticado
        if ($request->user()) {
            $this->data['usuario_logado'] = $request->user();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['data'] = $this->model->orderBy('id', 'desc')->paginate(9);
        return view($this->route . '.index')->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = 'Adicionar ' . $this->data['titulo'];
        $usuario_logado = $this->data['usuario_logado'];
        return view($this->route . '.create', compact('titulo', 'usuario_logado'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        unset($dados['_token']);

        if($this->model->create($dados)) {
            return redirect()->route($this->route . '.index')->with('status', 'Registro inserido com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o registro');
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
        $titulo = 'Editar' . $this->data['titulo'];
        $data = $this->model->find($id);
        $usuario_logado = $this->data['usuario_logado'];
        return view($this->route . '.edit', compact('data', 'titulo', 'descricao', 'usuario_logado'));
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

        $data = $request->all();
        unset($data['_token']);

        if ($this->model->where('id', $id)->update($data)) {
            return redirect()->route($this->route . '.index')->with('status', 'Registro alterado com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o Post');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if ($this->model->where('id', '=', $id)->delete()) {
            return redirect()->route($this->route . '.index')->with('status', 'Registro excluído com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao excluir o Post');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->model->find($id);
        return $post;
    }

   public function search(Request $request)
   {
       $this->data['data'] = $this->model->where($this->buscar_em, 'like', '%' . $request->table_search . '%')->paginate(9);
       $this->data['search'] = $request->table_search;
       return view($this->route . '.index')->with($this->data);
   }
}
