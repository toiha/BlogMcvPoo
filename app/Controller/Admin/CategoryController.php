<?php 
namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;
use \App;


Class CategoryController extends AppController{

	public function __construct(){
		parent::__construct();
		$this->loadModel('Post');
		$this->loadModel('Category');
	}

	/**
	 * Admin category landing page
	 */
	public function index(){
		$posts = $this->Post->last();
		$categories = $this->Category->all();
		['posts'=>$posts, 'categories'=>$categories];
		$this->render('admin.categories.index', compact('posts', 'categories'));
	}
	
	
	/**
	 * Page to add new category
	 */
	public function add(){
	if (!empty($_POST)) {
		$resultat =$this->Category->create([
		'title'=>$_POST['title']
		]);
		if ($resultat) {
		$id = App::getInstance()->getDb()->lastInsertId();
		header('Location: /admin/category/add/');
		}
	}
	$form = new BootstrapForm($_POST);
	$this->render('admin.categories.edit', compact('form'));
	}

	
	
	/**
	 * Displaying the edition category page
	 * @param  integer $id Id of the category to edit
	 */
	public function edit($id){
		$category = $this->Category->find($id);
		if (!empty($_POST)) {
			$resultat = $this->Category->update($id, [
				'title'=>$_POST['title']
			]);
			if ($resultat) {
			header('Location: /admin/category');
			}
		}
		$form = new BootstrapForm($category);
		$this->render('admin.categories.edit', compact('form', 'category'));
	}
	
		
	/**
	 * Removing a category with Id sent by POST
	 */
	public function del(){
	if (!empty($_POST)) {
		$this->Category->delete($_POST['id']);
		header('Location: /admin/category');
	}

	}

}