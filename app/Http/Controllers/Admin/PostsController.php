<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Categoria;
use App\Model\Post;
use App\Model\Site;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class PostsController extends Controller
{
    public $data = [];
    public $posts;
    public $categorias;

    public function __construct(Request $request, Post $posts, Categoria $categorias, Site $site)
    {
        if ($request->user()) {
            $this->data['user'] = $request->user();
        }
        $this->posts = $posts;
        $this->categorias = $categorias;
        $this->sites = $site;

        $this->data['titulo'] = 'Posts';
        $this->data['descricao'] = 'Lista com posts cadastrados.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$post = new Post;
        $this->data['posts'] = $this->posts->orderBy('id', 'desc')->paginate(9);
        return view('admin.posts.index')->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = $this->categorias->lists('nome', 'id');
        $sites = $this->sites->lists('nome', 'id');

        return view('admin.posts.create', compact('categorias', 'sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->hasFile('imagem'));

        $data = $request->all();
        if ($request->hasFile('imagem')) {
            $novoNome = date('d-m-Y-h-i-s') . '-' . $request->file('imagem')->getClientOriginalName();

            // dd($data['post']['x2']);
            if ($data['post']['x1'] !== '' && $data['post']['x2'] !== '' && $data['post']['y1'] !== '' && $data['post']['y2'] !== '') {
                // echo 'nulo';
                $w = $data['post']['x2'] - $data['post']['x1'];
                $h = $data['post']['y2'] - $data['post']['y1'];
                $x = $data['post']['x1'];
                $y = $data['post']['y1'];

                Image::configure(array('driver' => 'gd'));
                $image = Image::make($request->file('imagem'));
                // width, height, $x, $y
                $image->crop($w, $h, $x, $y);
                $image->save('assets/images/posts/' . $novoNome);

            } else {
                $image = Image::make($request->file('imagem'));
                $image->save('assets/images/posts/' . $novoNome);
            }
            $data["post"]["imagem"] = $novoNome;
            // dd($data["post"]);
        }

        if ($this->posts->create($data["post"])) {
            return redirect('admin/posts/')->with('status', 'Post inserido com sucesso!');
        } else {
            return redirect('admin/posts/')->with('status', 'Ocorreu um erro ao inserir o Post');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if ($this->posts->where('id', '=', $id)->delete()) {
            return redirect('admin/posts/')->with('status', 'Post excluído com sucesso!');
        } else {
            return redirect('admin/posts/')->with('status', 'Ocorreu um erro ao excluir o Post');
        }
    }

    public function search(Request $request)
    {
        $this->data['posts'] = $this->posts->where('titulo', 'like', '%' . $request->table_search . '%')->paginate(9);
        $this->data['search'] = $request->table_search;
        return view('admin.posts.index')->with($this->data);
    }
}
