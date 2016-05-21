<?php

namespace App\Http\Controllers\Admin;

use App\Model\Role;
use Illuminate\Http\Request;
use App\Model\Permission;
use DB;

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
        if(isset($role['permission'])) {
            $permissions = $role['permission'];
        }
        unset($role['permission']);

        $role = $this->model->create($role);

        if(isset($permissions)) {
            foreach ($permissions as $permission) {
                $role->permission()->attach($permission);
            }
        }

        return redirect('admin/roles/')->with('status', 'Papel inserido com sucesso!');
    }

    public function manager()
    {

        $this->data['roles'] = $this->model->get();
        $this->data['permissions'] = $this->permission->get();

        return view('admin.roles.manager', $this->data);
    }

    public function edit($id)
    {
        $this->data['data'] = $this->model->find($id);
        $this->data['permissions'] = $this->permission->get();
        return view('admin.roles.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $role = $request->all();
        unset($role['_token']);
        if(isset($role['permission'])){
            $permissions = $role['permission'];
        }
        unset($role['permission']);

        DB::beginTransaction();
        try {
            $this->model->where('id', $id)->update($role);
            $role = $this->model->find($id);

            $role->permission()->sync($permissions);
            DB::commit();
            return redirect('admin/roles/')->with('status-ok', 'Registro atualizado com sucesso.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/roles/')->with('status-erro', $e);
        }
    }

    public function ajaxStore(Request $request)
    {
        $dados = $request->all();
        // dd($request->all());
        $role = $this->model->find($dados['role_id']);

        $role->permission()->sync([$dados['permission_id']]);

        echo "FOI";
        exit;
    }

}
