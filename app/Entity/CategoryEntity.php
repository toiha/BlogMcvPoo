<?php
namespace App\Entity;
use \Core\Entity\Entity;

Class CategoryEntity extends Entity{
	
	public function getUrl(){
		return '/post/category/' . $this->id;
	}
	
}