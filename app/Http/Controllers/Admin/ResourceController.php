<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Resource;

class ResourceController extends CrudController
{

    public function __construct(Request $request, Resource $resource)
    {
        if ($request->user()) {
            $this->data['usuario_logado'] = $request->user();
        }
        $this->model = $resource;
        $this->route = 'admin.resources';
        $this->buscar_em = 'display_name';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->data['resources'] = $this->model->lists('nome', 'id');

        return view($this->route . '.create', $this->data);
    }
}
