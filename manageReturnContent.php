<?php
class ManageReturnContent{
	
	private $content;
	function __construct($content){
		$this->content = $content;
		$this->start();
	}

	function start(){
		print_r($this->content);
		exit();
	}
}
?>