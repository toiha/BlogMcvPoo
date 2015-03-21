<?php
namespace Core\Table;

use Core\Database\Database as MysqlDB;

Class Table{

	protected $table;
	protected $db;

	/**
	 * [__construct description]
	 * @param MysqlDB
	 */
	public function __construct(MysqlDB $db){
		$this->db = $db;
		if (is_null($this->table)) {
			$parts = explode('\\', get_class($this));
			$class_name = end($parts);
			$this->table = strtolower(str_replace('Table', '', $class_name));
		}
	}

	/**
	 * [query description]
	 * @param  String
	 * @param  Array|null
	 * @param  boolean
	 * @return [type]
	 */
	public function query($statement, $attributes = null, $one = false){
		if ($attributes) {
			return $this->db->prepare(
				$statement, 
				$attributes, 
				str_replace('Table', 'Entity', get_class($this)), 
				$one
			);
		}else{
			return $this->db->query(
				$statement,  
				str_replace('Table', 'Entity', get_class($this)), 
				$one
			);
		}
	}

	/**
	 * [all description]
	 * @return [type]
	 */
	public function all(){
		return $this->db->query("SELECT * FROM {$this->table}", str_replace('Table', 'Entity', get_class($this)));
	}

	/**
	 * [find description]
	 * @param  [type]
	 * @return [type]
	 */
	public function find($id){
		return $this->query("SELECT * FROM {$this->table} WHERE id=?", [$id], true);
	}

	/**
	 * [update description]
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	public function update($id, $fields){
		$sql_parts = [];
		$attributes = [];
		foreach ($fields as $k => $v) {
			$sql_parts[] = "$k=?";
			$attributes[] = $v;
		}
		$attributes[] = (int)$id;
		$sql_part = implode(', ',$sql_parts);
		return $this->query("UPDATE {$this->table} SET {$sql_part} WHERE id=?", $attributes, true);
	}

	/**
	 * [update description]
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	public function delete($id){
		return $this->query("DELETE FROM {$this->table} WHERE id=?", [$id], true);
	}

	/**
	 * [update description]
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	public function create($fields){
		$sql_parts = [];
		$attributes = [];
		foreach ($fields as $k => $v) {
			$sql_parts[] = "$k=?";
			$attributes[] = $v;
		}
		$sql_part = implode(', ',$sql_parts);
		return $this->query("INSERT INTO {$this->table} SET {$sql_part}", $attributes, true);
	}

	public function getList($key, $value){
		$records = $this->all();
		$return = [];
		foreach ($records as $v) {
			$return[$v->$key] =  $v->$value;
		}

		return $return;
	}
}