<h1>Twitter API</h1>
<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once('twitterStreaming.php');
	new TwitterStreaming();	
?>