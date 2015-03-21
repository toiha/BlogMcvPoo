<?php 
namespace Core;
Class Config{

	private $settings = [];
	private static $_instance;

	public static function getInstance($file){
		if (is_file($file)) {
			if (is_null(self::$_instance)) {
				self::$_instance = new Config($file);
			}
			return self::$_instance;
		}else{
			if (!isset($_GET['action'])) {
				header('Location: /?action=install');
			}
			die();
			// $style = "width:700px; margin: 200px auto; display: block;   font-size: 16px; line-height: 1.42857143;";
			// $message = "<div class='highlight' style='$style'> <pre> <code>";
			// $message .= "Créer votre base de données si ce n'est pas encore fait. ";
			// $message .= "Copier le fichier <span class='s'>config.sample.php</span>, qui se trouve dans <span class='s'>/config</span>, ";
			// $message .= "renommé le en <span class='s'>config.php</span> et y mettre les bonnes informations";
			// $message .= "</pre> </code> </div>";
			// echo $message;
			// die();
			
		}
	}

	private function __construct($file){
		$this->settings	= require ($file);
	}

	public function get($key){
		if (!isset($this->settings[$key])) {
			return null;
		}
		return $this->settings[$key];
	}


}