<h1>Twitter API</h1>
<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once('twitterStreaming.php');
	$stream = new TwitterStreaming();
	$stream->login();
	$stream->start(array('%2301net'));
	/*require_once('cassandra.php');
	new Cassandra();*/
	/*require_once('twitter.php');
	$twitter = new Twitter();
	$content = $twitter->request('https://api.twitter.com/1.1/search/tweets.json?q=%2301net&result_type=recent');
	$twitter->getInfo($content);*/
	
?>