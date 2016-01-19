<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use Illuminate\Http\Request;

class UsersController extends CrudController
{
    public $data = [];

    public function __construct(Request $request, User $users)
    {
        parent::__construct($request);

        $this->data['titulo'] = 'Usuários';
        $this->model = $users;
        $this->route = 'admin.users';
        $this->buscar_em = 'name';
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

        if ($this->model->create($data)) {
            return redirect()->route($this->route . '.index')->with('status', 'Post inserido com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o Post');
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

        if ($this->model->where('id', $id)->update($data)) {
            return redirect()->route($this->route . '.index')->with('status', 'Post alterado com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o Post');
        }
    }

}