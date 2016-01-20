<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use App\Model\Grupo;
use Illuminate\Http\Request;
use App\Services\UserService;

class UsersController extends CrudController
{
    public $data = [];
    public $grupos;

    public function __construct(Request $request, User $users, Grupo $grupos, UserService $service)
    {
        parent::__construct($request);

        $this->grupos = $grupos;
        $this->data['titulo'] = 'Usuários';
        $this->model = $users;
        $this->route = 'admin.users';
        $this->buscar_em = 'name';
        $this->service = $service;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = $this->grupos->lists('nome', 'id');
        $titulo = 'Novo' . $this->data['titulo'];
        return view($this->route . '.create', compact('grupos', 'titulo'));
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
        $data = $this->model->where('id', $id)
        ->select(['id', 'name', 'sobrenome', 'email', 'avatar', 'grupo_id', 'remember_token', 'created_at', 'updated_at', 'ativo'])
        ->get()[0];
        $grupos = $this->grupos->lists('nome', 'id');

        return view($this->route . '.edit', compact('data', 'grupos', 'descricao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $destino = 'assets/images/avatar/';
        $data = $this->service->cropImage($request, $destino);
        unset($data['repetir-password']);

        if ($this->model->create($data)) {
            return redirect()->route($this->route . '.index')->with('status', 'Usuário inserido com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o Usuário');
        }
    }

    public function update(Request $request, $id)
    {
        $destino = 'assets/images/avatar/';
        $data = $this->service->cropImage($request, $destino);
        unset($data['repetir-password']);

        // dd($data);
        if ($this->model->where('id', $id)->update($data)) {
            return redirect()->route($this->route . '.index')->with('status', 'Usuário alterado com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o Usuário');
        }
    }

}
