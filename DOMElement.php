<?php 
class NewDOMElement extends DOMElement{
	
	function addElement($tag, $value=null, $attributes=array()){
		global $dom;
		$this->$tag=$dom->createElement($tag);
		if(isset($value)){	
		$this->$tag->nodeValue=$value;
		}
		foreach($attributes as $attr => $value){
			$attr=strtolower($attr);
			$this->$tag->setAttribute($attr, $value);
			if($attr=="id"){
			$this->$tag->setIdAttribute("id", true);
			}
		}
		$this->appendChild($this->$tag);
		return($this->$tag);
	}
	
	
}


 ?>