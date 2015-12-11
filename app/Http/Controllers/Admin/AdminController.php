<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller {

	public $post_db;

	public function __construct() {
		//
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$data['tasks'] = [
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

		return view('admin.dashboard')->with($data);
	}
}
