<?php 
namespace App\Controller;

Class PostController extends AppController{

	public function __construct(){
		parent::__construct();
		$this->loadModel('Post');
		$this->loadModel('Category');
	}

	/**
	 * List of all posts
	 */
	public function index(){
		$posts = $this->Post->last();
		$categories = $this->Category->all();
		['posts'=>$posts, 'categories'=>$categories];
		$this->render('posts.index', compact('posts', 'categories'));
	}

	/**
	 * Diplay posts by category
	 * @param  integer $id Gategory Id
	 */
	public function category($id){
		$categorie = $this->Category->find($id);

		if ($categorie === false) {
			$this->notFound();
		}
		$posts = $this->Post->lastByCategory($id);
		$categories = $this->Category->all();

		['posts'=>$posts, 'categorie'=>$categorie, 'categories'=>$categories];
		$this->render('posts.category', compact('posts', 'categories', 'categorie'));
	}

	/**
	 * show post
	 * @param  integer $id post Id
	 */
	public function show($id){
		$post = $this->Post->findWidthCategory($id);
		if ($post === false) {
			$this->notFound();
		}
		
		$posts = $this->Post->lastByCategory($post->category_id);
		$categories = $this->Category->all();
		
		['post'=>$post, 'posts'=>$posts,'categories'=>$categories];
		$this->render('posts.show', compact('post', 'posts', 'categories'));
	}

}