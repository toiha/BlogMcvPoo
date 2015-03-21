<?php 
namespace App\Controller\Admin;
	
use \Core\HTML\BootstrapForm;
use \App;
	
/**
 * 
 */
Class PostController extends AppController{
	
	public function __construct(){
		parent::__construct();
		$this->loadModel('Post');
		$this->loadModel('Category');
	}
	
	public function index(){
		$posts = $this->Post->last();
		['posts'=>$posts];
		$this->render('admin.posts.index', compact('posts'));
	}
	
	public function add(){
		if (!empty($_POST)) {
			$resultat =$this->Post->create([
			'title'=>$_POST['title'], 
			'content'=>$_POST['content'],
			'category_id'=>$_POST['category_id'],
			'date'=>date('Y-m-d H:i:s'),
			]);
			if ($resultat) {
			$id = App::getInstance()->getDb()->lastInsertId();
			header('Location: /admin/post/add/');
			}
		}
		$categories = $this->Category->getList('id', 'title');
		$form = new BootstrapForm($_POST);
		$this->render('admin.posts.edit', compact('form', 'categories'));
	}

	/**
	 * 
	 * @param integer $id
	 */
	public function edit($id){
		$post = $this->Post->find($id);
		$categories = $this->Category->all();
		if (!empty($_POST)) {
			$resultat = $this->Post->update($id, [
				'title'=>$_POST['title'], 
				'content'=>$_POST['content'],
				'category_id'=>$_POST['category_id']
			]);
			if ($resultat) {
			header('Location: /admin');
			}
		}
		$categories = $this->Category->getList('id', 'title');
		$form = new BootstrapForm($post);
		$this->render('admin.posts.edit', compact('form', 'categories', 'post'));
	}
	
	public function del(){
		if (!empty($_POST)) {
			$this->Post->delete($_POST['id']);
			header('Location: /admin');
		}
	}
	
}