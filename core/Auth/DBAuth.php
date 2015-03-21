<?php
namespace Core\Auth;

use Core\Database\Database;

Class DBAuth{

	private $db;

	public function __construct(Database $db){
		$this->db = $db;
	}

	/**
	 * [getUersId description]
	 * @return int 
	 */
	public function getUersId(){
		if ($this->logged()) {
			return $_SESSION['auth'];
		}
		return false;
	}

	/**
	 * Authentification utilisateur
	 * @param  String $username Nom d'utillisateur
	 * @param  String $password Mot de passe 
	 * @return boolean      Renvoi true si la coonexion a réussi sinon renvoi false
	 */
	public function login($username, $password){
		$user = $this->db->prepare("SELECT * FROM users WHERE username = ?", [$username], null, true);
		if ($user) {
			if ($user->password === sha1($password)) {
				$_SESSION['auth'] = $user->id;
				return true;
			}
		}
		return false;
		
	}

	/**
	 * Cette function verfie si l'utilisateur est connecter ou pas
	 * @return boolean Renvoi true si l'itulisateur est connecté
	 */
	public function logged(){
		if (isset($_SESSION['auth'])) {
			return true;		
		}
	}

}
