<?php
namespace Core\Database;

use \PDO;

Class MysqlDatabase extends Database{

	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;

	public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost'){
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;
	}

	private function getPDO(){
		if ($this->pdo === null) {
			try {
				$pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
				$this->pdo = $pdo;
			} catch (PDOException $e) {
				echo 'Échec lors de la connexion : ' . $e->getMessage();
			}
		}
		return $this->pdo;
	}

	public function query($statement, $class_name = null, $one = false){
		$req = $this->getPDO()->query($statement);
		// Si on veut une query sans résultat
		if (
				strpos($statement, "UPDATE") === 0 ||
				strpos($statement, "INSERT") === 0 ||
				strpos($statement, "DELETE") === 0
			) {
			return $req;
		}

		if ($class_name === null) {
			$req->setFetchMode(PDO::FETCH_OBJ);
		}else{
			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);
		}
		if ($one) {
			$datas = $req->fetch();
		}else{
			$datas = $req->fetchAll();
		}
		return $datas;
	}

	public function prepare($statement, $options, $class_name = null, $one=false){
		$req = $this->getPDO()->prepare($statement);
		$res = $req->execute($options);
		// Si on veut une query sans résultat
		if (
				strpos($statement, "UPDATE") === 0 ||
				strpos($statement, "INSERT") === 0 ||
				strpos($statement, "DELETE") === 0
			) {
			return $res;
		}
		if ($class_name === null) {
			$req->setFetchMode(PDO::FETCH_OBJ);
		}else{
			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);
		}
		if ($one) {
			$datas = $req->fetch();
		}else{
			$datas = $req->fetchAll();
		}
		return $datas;
	}

	public function lastInsertId(){
		return $this->getPDO()->lastInsertId();
	}

}