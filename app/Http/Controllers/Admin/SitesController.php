<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Site;
use App\Services\SiteService;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    public $data = [];
    public $sites;

    public function __construct(Request $request, Site $site)
    {
        if ($request->user()) {
            $this->data['user'] = $request->user();
        }
        $this->sites = $site;

        $this->data['titulo'] = 'Sites';
        $this->data['descricao'] = 'Lista com sites cadastrados.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['sites'] = $this->sites->orderBy('id', 'desc')->paginate(9);
        return view('admin.sites.index')->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites = $this->sites->lists('nome', 'id');
        $titulo = 'Sites';
        $descricao = 'Cadastrar Novo Site/Blog';

        return view('admin.sites.create', compact('sites', 'titulo', 'descricao'));
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
            return redirect('admin/sites/')->with('status', 'Post inserido com sucesso!');
        } else {
            return redirect('admin/sites/')->with('status', 'Ocorreu um erro ao inserir o Post');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->sites->find($id);
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = $this->sites->find($id);
        $titulo = 'Sites';
        $descricao = 'Editar Site';

        return view('admin.sites.edit', compact('site', 'titulo', 'descricao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, SiteService $service)
    {
        $destino = 'assets/images/sites/';
        $data = $service->cropImage($request, $destino);

        if ($this->sites->where('id', $id)->update($data)) {
            return redirect('admin/sites/')->with('status', 'Post alterado com sucesso!');
        } else {
            return redirect('admin/sites/')->with('status', 'Ocorreu um erro ao inserir o Post');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if ($this->sites->where('id', '=', $id)->delete()) {
            return redirect('admin/sites/')->with('status', 'Post excluído com sucesso!');
        } else {
            return redirect('admin/sites/')->with('status', 'Ocorreu um erro ao excluir o Post');
        }
    }

    public function search(Request $request)
    {
        $this->data['sites'] = $this->sites->where('nome', 'like', '%' . $request->table_search . '%')->paginate(9);
        $this->data['search'] = $request->table_search;
        return view('admin.sites.index')->with($this->data);
    }

}
