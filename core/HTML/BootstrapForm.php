<?php
namespace Core\HTML;
/**
 * Class BootstrapForm
 */
Class BootstrapForm extends Form{

 	/**
	* @param $html String le code html entourer
	* @return string
	**/
 	protected function surround($html){
 		return "<div class=\"form-group\">{$html}</div>";
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
 		$htmlLabel = '<label>' .$label. '</label>';
 		if ($type==='textarea') {
	 		$input = '<textarea name="'.$name.'" class="form-control" placeholder="' .$label. '" rows="10" />'. $this->getValue($name) .'</textarea>'; 			
 		}else{
 			$input = '<input type="'.$type.'"  name="'.$name.'" value="'. $this->getValue($name) .'" class="form-control" placeholder="' .$label. '" />';
 		}
 		return $this->surround($htmlLabel.$input);
 	}

 	public function select($name, $label, $options){
 		$htmlLabel = '<label>' .$label. '</label>';
 		$input = '<select class="form-control" name="' . $name . '">';
 		foreach ($options as $k => $v) {
 			$attributes = "";
 			if ($k == $this->getValue($name)) {
 				$attributes .= " selected";
 			}
 			$input .= '<option value='.$k.' '.$attributes.' >'.$v.'</option>';
 		}
		$input .= '</select>';
		return $this->surround($htmlLabel.$input);
 	}

 	/**
	* @return string
	**/
 	public function submit($value = "Envoyer"){
 		return $this->surround("<button type='submit' class='btn btn-primary'>$value</button>");
 	}
}