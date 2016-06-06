<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Admin\CrudController;

class MenusController extends CrudController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->data['titulo'] = 'Gerenciar Menus';
        // $this->repository = $categorias;
        $this->route = 'admin.menus';
        $this->buscar_em = 'nome';
    }

    public function index()
    {


        return view('admin.menus.index', $this->data);
    }
}
