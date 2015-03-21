<?php 
namespace App\Controller\Admin;
    
use Core\Database\QueryBuilder;
    
/**
 * 
 */
Class DemoController extends AppController{
    
   
    function index( ){
		$query = new QueryBuilder();
		echo $query
			->select('id', 'titre', 'content')
			->from('post')
			->where('id = 1')
			->where('date > NOW()');
    }
	
}