<?php

namespace App\Http\Controllers\Admin;

use App\Model\Role;
use Illuminate\Http\Request;
use App\Model\Permission;

class RolesController extends CrudController
{
    public $data = [];

    public function __construct(Request $request, Role $roles, Permission $permission)
    {
        parent::__construct($request);

        $this->data['titulo'] = 'Papéis';
        $this->model = $roles;
        $this->permission = $permission;
        $this->route = 'admin.roles';
        $this->buscar_em = 'name';
    }

    public function create()
    {
        $this->data['titulo'] = 'Adicionar ' . $this->data['titulo'];
        $this->data['roles'] = $this->model->get();
        $this->data['permissions'] = $this->permission->get();

        // dd($this->data['permissions'][0]->permissions[0]->name);

        return view('admin.roles.create', $this->data);
    }

    public function store(Request $request)
    {
        $role = $request->all();

        unset($role['_token']);
        $permissions = $role['permission'];
        unset($role['permission']);

        // dd($permissions);

        $role = $this->model->create($role);
        foreach ($permissions as $permission) {
            $role->permission()->attach($permission);
        }
    }

    public function manager()
    {


        return view('admin.roles.manager', $this->data);
    }

}
