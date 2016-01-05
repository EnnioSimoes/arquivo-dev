<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Categoria;
// use App\Model\Post;
// use App\Model\Site;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class CategoriasController extends Controller
{
    public $data = [];
    public $categorias;

    public function __construct(Request $request, Categoria $categorias)
    {
        if ($request->user()) {
            $this->data['user'] = $request->user();
        }
        $this->categorias = $categorias;

        $this->data['titulo'] = 'Categorias';
        $this->data['descricao'] = 'Lista com categorias cadastrados.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categorias'] = $this->categorias->orderBy('id', 'desc')->paginate(9);
        return view('admin.categorias.index')->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = 'Post';
        $descricao = 'Criar Novo Post';

        return view('admin.categorias.create', compact('titulo', 'descricao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = self::hasImage($request);
        if ($data['slug'] == '') {
            $data['slug'] = str_slug($data['nome']);
        }

        if ($this->categorias->create($data)) {
            return redirect('admin/categorias/')->with('status', 'Post inserido com sucesso!');
        } else {
            return redirect('admin/categorias/')->with('status', 'Ocorreu um erro ao inserir o Post');
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
        $post = $this->categorias->find($id);
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
        $categoria = $this->categorias->find($id);
        $titulo = 'Categoria';
        $descricao = 'Editar Categoria';

        return view('admin.categorias.edit', compact('categoria', 'titulo', 'descricao'));
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

        $data = self::hasImage($request);

        if ($this->categorias->where('id', $id)->update($data)) {
            return redirect('admin/categorias/')->with('status', 'Post alterado com sucesso!');
        } else {
            return redirect('admin/categorias/')->with('status', 'Ocorreu um erro ao inserir o Post');
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
        if ($this->categorias->where('id', '=', $id)->delete()) {
            return redirect('admin/categorias/')->with('status', 'Post excluído com sucesso!');
        } else {
            return redirect('admin/categorias/')->with('status', 'Ocorreu um erro ao excluir o Post');
        }
    }

    public function search(Request $request)
    {
        $this->data['categorias'] = $this->categorias->where('nome', 'like', '%' . $request->table_search . '%')->paginate(9);
        $this->data['search'] = $request->table_search;
        return view('admin.categorias.index')->with($this->data);
    }
    /**
     *  Verifica se foi enviada imagem e se for o caso faz o crop e envia para a pasta
     */
    public static function hasImage($request)
    {
        $data = $request->all();
        if ($request->hasFile('imagem')) {
            $novoNome = date('d-m-Y-h-i-s') . '-' . $request->file('imagem')->getClientOriginalName();

            if ($data['x1'] !== '' && $data['x2'] !== '' && $data['y1'] !== '' && $data['y2'] !== '') {

                $w = $data['x2'] - $data['x1'];
                $h = $data['y2'] - $data['y1'];
                $x = $data['x1'];
                $y = $data['y1'];

                Image::configure(array('driver' => 'gd'));
                $image = Image::make($request->file('imagem'));
                // width, height, $x, $y
                $image->crop($w, $h, $x, $y);
                $image->save('assets/images/categorias/' . $novoNome);

            } else {
                $image = Image::make($request->file('imagem'));
                $image->save('assets/images/categorias/' . $novoNome);
            }

            $data["imagem"] = $novoNome;

        }
        unset($data['_token']);
        unset($data['x1']);
        unset($data['y1']);
        unset($data['x2']);
        unset($data['y2']);

        return $data;
    }
}
