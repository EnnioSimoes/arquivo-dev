<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PermissionRepository;
// use App\Model\Permission;
use Illuminate\Http\Request;

class PermissionController extends CrudController
{
    public $data = [];

    public function __construct(Request $request, PermissionRepository $permissions)
    {
        parent::__construct($request);

        $this->data['titulo'] = 'Permissões';
        $this->repository = $permissions;
        $this->route = 'admin.permissions';
        $this->buscar_em = 'name';
    }

}
