<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Post;

class HomeController extends Controller {

	public $post_db;

	public function __construct(Post $posts) {
		$this->post_db = new Post;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$posts = $this->post_db->get();
		//Lembra disso Alex?? kkk
		//dd($posts);

		return view('home', compact('posts'));
	}
}
