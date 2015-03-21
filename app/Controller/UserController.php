<?php 
namespace App\Controller;

use \Core\HTML\BootstrapForm;
use \Core\Auth\DBAuth;
use \App;

Class UserController extends AppController{
	
	public function __construct(){
		parent::__construct();
		$this->loadModel('User');
	}

	public function login(){
	    $this->template = 'login';
		$error = false;
		if (!empty($_POST)) {
			$auth = new DBAuth(App::getInstance()->getDb());
			if ($auth->login($_POST['username'], $_POST['password'])) {
				header('Location: /admin');
			}else{
				$error = "Identifiant incorrect";
			}
		}
		$form = new BootstrapForm($_POST);
		$this->render('users.login', compact('form', 'error'));
	}



}