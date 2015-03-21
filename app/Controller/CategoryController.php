<?php 
//namespace App\Controller;
//
//Class CategoryController extends AppController{
//
//	public function __construct(){
//		parent::__construct();
//		$this->loadModel('Post');
//		$this->loadModel('Category');
//	}
//
//	public function index(){
//		$posts = $this->Post->last();
//		$categories = $this->Category->all();
//		['posts'=>$posts, 'categories'=>$categories];
//		$this->render('posts.index', compact('posts', 'categories'));
//	}
//
//	public function category($id){
//		$categorie = $this->Category->find($id);
//
//		if ($categorie === false) {
//			$this->notFound();
//		}
//		$posts = $this->Post->lastByCategory($id);
//		$categories = $this->Category->all();
//
//		['posts'=>$posts, 'categorie'=>$categorie, 'categories'=>$categories];
//		$this->render('posts.category', compact('posts', 'categories', 'categorie'));
//	}
//
//	public function show($id){
//		$post = $this->Category->lastByCategory($id);
//		if ($post === false) {
//			$this->notFound();
//		}
//		['category'=>$post];
//		$this->render('posts.show', compact('category'));
//	}
//
//}