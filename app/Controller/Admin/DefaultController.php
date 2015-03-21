<?php 
namespace App\Controller\Admin;

Class DefaultController extends AppController{
	public function __construct(){
	parent::__construct();
	$this->loadModel('Post');
	$this->loadModel('Category');
	}

	/**
	 * Admin landing page
	 */
	public function index(){
		$posts = $this->Post->last();
		$categories = $this->Category->all();
		['posts'=>$posts, 'categories'=>$categories];
		$this->render('admin.index', compact('posts', 'categories'));
	}

}