<?php

namespace App\Http\Controllers;

use App\CardCategory;
use Asm89\Twig\CacheExtension\Exception\BaseException;
use Corcel\Model\Post;
use Illuminate\Http\Request;

class StartController extends BaseController
{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$posts = Post::with(['author','attachment'])->type('post')->status('publish')->take(3)->orderBy('id', 'DESC')->get();
		return view('start', compact('posts'));
	}

	public function cardList() {
		$posts = Post::with(['author','attachment'])->type('post')->status('publish')->take(3)->orderBy('id', 'DESC')->get();
		return view('card-list', compact('posts'));
	}
}
