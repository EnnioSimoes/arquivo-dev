<?php

namespace App\Http\Controllers\Admin;

use App\Model\Role;
use Illuminate\Http\Request;
use App\Model\Resource;

class RolesController extends CrudController
{
    public $data = [];

    public function __construct(Request $request, Role $roles, Resource $resource)
    {
        parent::__construct($request);

        $this->data['titulo'] = 'Papéis';
        $this->model = $roles;
        $this->resource = $resource;
        $this->route = 'admin.roles';
        $this->buscar_em = 'name';
    }

    public function create()
    {
        $this->data['titulo'] = 'Adicionar ' . $this->data['titulo'];
        $this->data['roles'] = $this->model->get();
        $this->data['resources'] = $this->resource->get();

        // dd($this->data['resources'][0]->permissions[0]->name);

        return view('admin.roles.create', $this->data);
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function manager()
    {
        return view('admin.roles.manager');
    }

}
