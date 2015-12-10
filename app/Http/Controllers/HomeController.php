<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Post;

class HomeController extends Controller {

	public $post;

	public function __construct(Post $posts) {
		$this->post = new Post;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		//Lembra disso Alex?? kkk
		//dd($this->post->find(12));

		return view('home');
	}
}
