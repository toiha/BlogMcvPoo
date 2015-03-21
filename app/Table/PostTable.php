<?php
    
namespace App\Table;
use \Core\Table\Table;
    
Class PostTable extends Table{
    protected $table = 'posts';

	/**
	 * Retrieves last posts
	 * @return Array
	 */
	public function last(){
		return $this->query("
				SELECT posts.id, posts.name, posts.content, posts.created, categories.title as categories
				FROM posts
				LEFT JOIN categories ON category_id = categories.id
				ORDER BY posts.created DESC");
	}
	    
	/**
	 * Gets the last posts with categories request
	 * @param integer $category_id 
	 * @return Array
	 */
	public function lastByCategories($category_id){
		return $this->query("
				SELECT posts.id, posts.name, posts.content, posts.created, categories.title as categories
				FROM posts
				LEFT JOIN categories ON category_id = categories.id
				WHERE posts.category_id =?
				ORDER BY posts.created DESC", [$category_id]);
	}
	    
	/**
	 *  Retrieve an article by linking partner categories
	 * @param integer $id
	 * @return Posts
	 */
	public function findWidthCategories($id){
		return $this->query("
				SELECT posts.id, posts.name, posts.content, posts.created, categories.title as categories, posts.category_id
				FROM posts
				LEFT JOIN categories ON category_id = categories.id
				WHERE posts.id =?", [$id], true);
	}
}