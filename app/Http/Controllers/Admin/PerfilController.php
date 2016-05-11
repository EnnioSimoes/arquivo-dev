<?php
//VERIFICAR REMOCAO
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    public $data = [];

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
    public function index(Request $request)
    {
//            dd($request->user());

        return view('admin.perfil.index')->with($this->data);
    }
}
