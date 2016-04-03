<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Zizaco\Entrust\Traits\EntrustRoleTrait;


class AdminController extends Controller
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
        
        $user = new \App\Model\User;
        $v = $user->find(1);
//        dd($v->hasRole(["admin"], true));
        
        $this->data['tasks'] = [
            [
                'name' => 'Design New Dashboard',
                'progress' => '90',
                'color' => 'danger',
            ],
            [
                'name' => 'Create Home Page',
                'progress' => '76',
                'color' => 'warning',
            ],
            [
                'name' => 'Some Other Task',
                'progress' => '32',
                'color' => 'success',
            ],
            [
                'name' => 'Start Building Website',
                'progress' => '56',
                'color' => 'info',
            ],
            [
                'name' => 'Develop an Awesome Algorithm',
                'progress' => '10',
                'color' => 'success',
            ],
        ];

        return view('admin.dashboard')->with($this->data);
    }
}
