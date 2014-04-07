<?php
class ManageReturnContent{
	
	private $content;
	function __construct($content){
		$this->content = $content;
		$this->start();
	}

	function start(){
  		var_dump($this->content);
        echo "<br>";
        echo "<br>";
  		print($this->content['user']['description']);
 		exit();
	}

}
?>