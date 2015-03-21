<?php
namespace Core\HTML;

/**
* Class Form
* Permet de generer un formulaire rapidement est simplement
**/
 class Form{
	/** 
	* @var array Données utilisées par le formulaire
	**/
 	protected $data;

	/**
	* @var string Tag utilisées pour entourer les champs
	**/
 	public $surround = "p";
 	
 	/**
	* @param $data Array  Données utilisées par le formulaire
	**/
 	public function __construct($data = array()){
 		$this->data = $data;
 	}

 	/**
	* @param $html String le code html entourer
	* @return string
	**/
 	protected function surround($html){
 		return "<{$this->surround}>{$html}</{$this->surround}>";
 	}

 	/**
	* @param $index String l'index de la valeur à récupérer
	* @return string
	**/
 	protected function getvalue($index){
 		if (is_object($this->data)) {
 			return isset($this->data->$index) ? $this->data->$index : null;
 		}
 		return isset($this->data[$index]) ? $this->data[$index] : null;
 	}

	/**
	 * Function input renvoir un champ input
	 * @param  $name 
	 * @param  $label 
	 * @param  Array $option
	 * @return String
	 */
 	public function input($name, $label, $options = []){
 		$type = isset($options['type']) ? $options['type'] : 'text';
 		return $this->surround(
 			"<input type='".$type."' name='".$name."' value='". $this->getValue($name) ."' />"
 			);
 	}

 	/**
	* @return string
	**/
 	public function submit($value = "Envoyer"){
 		return $this->surround("<button type='submit'>$value</button>");
 	}
 }