<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Repositories\PermissionRepository;
// use App\Model\Permission;
use DB;

class RolesController extends CrudController
{
    public $data = [];

    public function __construct(Request $request, RoleRepository $roles, PermissionRepository $permission)
    {
        parent::__construct($request);

        $this->data['titulo'] = 'Papéis';
        $this->repository = $roles;
        $this->permission = $permission;
        $this->route = 'admin.roles';
        $this->buscar_em = 'name';
    }

    public function create()
    {
        $this->data['titulo'] = 'Adicionar ' . $this->data['titulo'];
        // $this->data['roles'] = $this->repository->all();
        $this->data['permissions'] = $this->permission->all();

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

        $role = $this->repository->create($role);

        if(isset($permissions)) {
            foreach ($permissions as $permission) {
                $role->permission()->attach($permission);
            }
        }

        return redirect('admin/roles/')->with('status', 'Papel inserido com sucesso!');
    }

    public function manager()
    {
        // $this->data['roles'] = $this->repository->get();
        $this->data['roles'] = $this->repository->orderBy('name', 'asc')->all();
        $this->data['permissions'] = $this->permission->orderBy('name', 'asc')->all();

        return view('admin.roles.manager', $this->data);
    }

    public function edit($id)
    {
        $this->data['data'] = $this->repository->find($id);
        $this->data['permissions'] = $this->permission->all();
        // dd($this->data['data']->permission()->get());
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
            $this->repository->update($role, $id);
            $role = $this->repository->find($id);

            $role->permission()->sync($permissions);
            DB::commit();
            return redirect('admin/roles/')->with('status-ok', 'Registro atualizado com sucesso.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/roles/')->with('status-erro', $e);
        }
    }

    /**
     * Recebe Ajax para atualizar lista de permissions de uma determinada Role
     * @param  Request $request [Post AJAX]
     */
    public function ajaxStore(Request $request)
    {
        $dados = $request->all();
        // dd($dados["permission_id"]);
        $role = $this->repository->find($dados['role_id']);

        $role->permission()->sync($dados['permission_id']);

        echo "FOI";
        exit;
    }

}
