<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use Illuminate\Http\Request;

class PermissionController extends CrudController
{
    public $data = [];

    public function __construct(Request $request, Permission $permissions)
    {
        parent::__construct($request);

        $this->data['titulo'] = 'Permissões';
        $this->model = $permissions;
        $this->route = 'admin.permissions';
        $this->buscar_em = 'name';
    }

}
