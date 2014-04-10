<h1>Twitter API</h1>
<?php
	/**
	* this file start the TwitterStreaming class
	**/
	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT',dirname(__FILE__));
	header('Content-Type: text/html; charset=utf-8');
	require_once(ROOT.DS.'class'.DS.'twitterStreaming.php');
	new TwitterStreaming();	
?>