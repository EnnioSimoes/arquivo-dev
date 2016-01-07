<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class CrudController extends Controller
{
    protected $service;
    protected $model;
    protected $route;
    protected $data = [];

    public function __construct(Request $request)
    {
        if ($request->user()) {
            $this->data['user'] = $request->user();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($this->data['user']);
        $this->data['data'] = $this->model->orderBy('id', 'desc')->paginate(9);
        return view($this->route . '.index')->with($this->data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if ($this->model->where('id', '=', $id)->delete()) {
            return redirect()->route($this->route . '.index')->with('status', 'Post excluído com sucesso!');
        } else {
            return redirect()->route($this->route . '.index')->with('status', 'Ocorreu um erro ao excluir o Post');
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
        $post = $this->model->find($id);
        return $post;
    }
}

