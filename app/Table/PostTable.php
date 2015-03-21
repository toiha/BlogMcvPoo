<?php
    
namespace App\Table;
use \Core\Table\Table;
    
Class PostTable extends Table{
    

	/**
	 * Retrieves last posts
	 * @return Array
	 */
	public function last(){
		return $this->query("
				SELECT posts.id, posts.name, posts.content, posts.created, category.title as category
				FROM posts
				LEFT JOIN category ON category_id = category.id
				ORDER BY posts.created DESC");
	}
	    
	/**
	 * Gets the last posts with category request
	 * @param integer $category_id 
	 * @return Array
	 */
	public function lastByCategory($category_id){
		return $this->query("
				SELECT posts.id, posts.name, posts.content, posts.created, category.title as category
				FROM posts
				LEFT JOIN category ON category_id = category.id
				WHERE posts.category_id =?
				ORDER BY posts.created DESC", [$category_id]);
	}
	    
	/**
	 *  Retrieve an article by linking partner category
	 * @param integer $id
	 * @return Posts
	 */
	public function findWidthCategory($id){
		return $this->query("
				SELECT posts.id, posts.name, posts.content, posts.created, category.title as category, posts.category_id
				FROM posts
				LEFT JOIN category ON category_id = category.id
				WHERE posts.id =?", [$id], true);
	}
}