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
     * Gets the last post with category request
     * @param  integer $category_id
     * @return Array
     */
    public function lastByCategory($category_id){
	    return $this->query("
			    SELECT post.id, post.title, post.content, post.date, category.title as category
			    FROM post
			    LEFT JOIN category ON category_id = category.id
			    WHERE post.category_id =?
			    ORDER BY post.date DESC", [$category_id]);
    }

}   