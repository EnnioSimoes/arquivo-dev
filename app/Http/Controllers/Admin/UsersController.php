<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Model\Role;
use DB;

class UsersController extends CrudController
{
    public $data = [];

    public function __construct(Request $request, User $users, UserService $service, Role $roles)
    {
        parent::__construct($request);

        $this->roles = $roles;
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
        $roles = $this->roles->get();
        // dd($roles);
        $titulo = 'Novo Usuário';
        $user = $this->data['user'];
        return view($this->route . '.create', compact('titulo', 'user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulo = 'Editar Usuário';
        $roles = $this->roles->get();
        $user = $this->data['user'];
        $data = $this->model->where('id', $id)
        ->select(['id', 'name', 'sobrenome', 'email', 'avatar', 'remember_token', 'created_at', 'updated_at', 'ativo'])
        ->get()[0];
        // $user_roles = $data->roles;
        // dd($data->roles);
        return view($this->route . '.edit', compact('data', 'titulo', 'roles', 'user'));
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
        unset($data['roles']);

        $user = $this->model->create($data);
        if ($user) {
            foreach ($request->roles as $roles) {
                $user->attachRole($roles);
            }
            return redirect()->route($this->route . '.index')->with('status', 'Usuário inserido com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o Usuário');
        }
    }

    public function update(Request $request, $id)
    {
        // $r = $this->roles->get();

        $destino = 'assets/images/avatar/';
        $data = $this->service->cropImage($request, $destino);
        unset($data['repetir-password']);
        unset($data['roles']);

        if ($this->model->where('id', $id)->update($data)) {
            $user = $this->model->where('id', $id)->get()[0];
            if(count($request->roles) > 0) {
                if(count($user->roles) > 0) {
                    foreach ($user->roles as $remove_roles) {
                        $list_remove_roles[] = $remove_roles->id;
                    }
                    $user->detachRoles($list_remove_roles);
                }

                $user->attachRoles($request->roles);
            }
        // if ($this->model->where('id', $id)->update($data)) {
            return redirect()->route($this->route . '.index')->with('status', 'Usuário alterado com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o Usuário');
        }
    }

}
