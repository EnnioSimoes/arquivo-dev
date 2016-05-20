<?php

namespace App\Http\Controllers\Admin;

use App\Model\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Services\SiteService;

class SitesController extends CrudController
{
    public $data = [];
    public $sites;

    public function __construct(Request $request, Site $site)
    {

        parent::__construct($request);
        $this->sites = $site;
        $this->data['titulo'] = 'Site';
        $this->model = $site;
        $this->route = 'admin.sites';
        $this->buscar_em = 'nome';
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request, SiteService $service)
    {
        $destino = 'assets/images/sites/';
        $data = $service->cropImage($request, $destino);

        if ($this->sites->create($data)) {
            return redirect('admin/sites/')->with('status-ok', 'Post inserido com sucesso!');
        } else {
            return redirect('admin/sites/')->with('status-erro', 'Ocorreu um erro ao inserir o Post');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['x1']);
        unset($data['x2']);
        unset($data['y1']);
        unset($data['y2']);

        if ($this->model->where('id', $id)->update($data)) {
            return redirect()->route($this->route . '.index')->with('status', 'Post alterado com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao inserir o Post');
        }
    }
}
