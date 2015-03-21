<?php
namespace Core\Controller;
use \App;

Class Controller{

	protected $viewPath;
	protected $template;

	/**
	 * Affichage de la vue
	 * Import les variables dans la vue 
	 * @param  String $view       Nom de la vue
	 * @param  Array $varialbles Tableau de variables
	 */
	protected function render($view, $varialbles = []){
		App::getInstance()->title =  ucfirst(  str_replace( ['.', 'index'], [' ', ''], $view)) ." | ". App::getInstance()->title;
		ob_start();
		extract($varialbles);
		require($this->viewPath . str_replace('.', '/', $view) . '.php');
		$content = ob_get_clean();
		require($this->viewPath . 'templates/' . $this->template . '.php');
	}

	/**
	 * [notFound description]
	 */
	protected function notFound(){
		header('HTTP/1.0 404 Not Found');
		die('Page introuvable');
	}

	/**
	 * [forbidden description]
	 */
	protected function forbidden(){
//		header('HTTP/1.0 403 Forbindden');
		header('Location: /user/login');
		die("Acces interdit");
	}

}