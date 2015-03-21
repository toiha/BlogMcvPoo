<?php 
define('ROOT', dirname(__DIR__));

if (!is_file(ROOT .'/config/config.php')) {
	if(isset($_POST['install'])){
		unset($_POST['install']);
		$contents = var_export($_POST, true);
		file_put_contents(ROOT .'/config/config.php', "<?php\n return {$contents};\n ?>");
		header('Location: /');
	}elseif (isset($_GET)) {
		require ROOT . '/public/install.php';
		die();
	}
}

require ROOT . '/app/App.php';
App::load();
$app = App::getInstance();
$app->title = "Mes notes..."; 
$p = (isset($_GET['p'])) ? $_GET['p'] : 'post' ;
$paramsUrl = explode("/", $p);
$ctrlUrl = isset($paramsUrl[0])? $paramsUrl[0] : 'post';

if( $ctrlUrl == 'admin'){
    $ctrlUrl = isset($paramsUrl[1]) ? $paramsUrl[1] : "default";
    $controller = '\App\\Controller\Admin\\' . ucfirst($ctrlUrl) . 'Controller';
    $action = isset($paramsUrl[2])? $paramsUrl[2] : 'index';
    $param = isset($paramsUrl[3])? $paramsUrl[3] : null;
}else{
    $controller = '\App\\Controller\\' . ucfirst($ctrlUrl) . 'Controller';
    $action = isset($paramsUrl[1])? $paramsUrl[1] : 'index';
    $param = isset($paramsUrl[2])? $paramsUrl[2] : null;
}
$controller = new $controller;
$controller->$action($param);