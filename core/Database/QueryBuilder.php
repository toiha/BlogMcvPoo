<?php
namespace Core\Database;

Class QueryBuilder{
	
	private $fields = [];
	private $conditions = [];
	private $from = [];
	
	public function select(){
		$this->fields = func_get_args();
		return $this;
	}
	
	public function where(){
		foreach( func_get_args() as $args ){
			$this->conditions[] = $args;
		}
		return $this;
	}
	
	public function from( $table, $alias=null ){
		if( is_null( $alias)){
			$this->from[] = $table;
		}else{
			$this->from[] = "$table AS $alias"; 
		}
		return $this;
	}
	
	public function __toString(){
		return "SELECT " . implode(", ", $this->fields)
			. " FROM " . implode(", ", $this->from)
			. " WHERE " . implode(" AND ", $this->conditions);
	}
}