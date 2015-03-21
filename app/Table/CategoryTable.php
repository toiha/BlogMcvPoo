<?php
namespace App\Table;
use \Core\Table\Table;

Class CategoryTable extends Table{
    
    /**
     * 
     * @param $category_id int 
     * @return array
     */
    
    /**
     * Gets the last posts with category request
     * @param  integer $category_id
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

}   