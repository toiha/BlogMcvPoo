<?php
namespace App\Entity;
use \Core\Entity\Entity;

Class PostEntity extends Entity{
	
	/**
	 * Display post base URL
	 * @return String Post url
	 */
	public function getUrl(){
		return '/post/show/' . $this->id;
	}

	/**
	 * Return extratc of content
	 * @param  integer $bn_car Number of characters to display
	 * @return String Html extratct of post content
	 */
	public function getExtrait( $bn_car = 200 ){
		$html = '<p>'. substr($this->content, 0, $bn_car) .'...</p>';
		$html .= '<p><a href="'. $this->getUrl() .'">Voir la suite</a></p>';
		return $html;
	}
	
}