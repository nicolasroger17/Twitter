<h1>Twitter API</h1>
<?php
	header('Content-Type: text/html; charset=utf-8');
	$consumer_key='IWnNQRsCd2JF4p1jHL63Q'; //Provide your application consumer key
	$consumer_secret='tDVLN26kyGL2F1evaDTIPYpSuiVTEUyJk9fdAA6YWFo'; //Provide your application consumer secret
	$oauth_token = '2407736024-ye1xkvxwjrebpev7JMav3gs0zNPtsDTrHnLXvsV'; //Provide your oAuth Token
	$oauth_token_secret = '9N6Za5vHB7YGzVs7tG0ujifR0qRwpJyq73tUlCo29VKRn';

	require_once('APIs/twitteroauth-master/twitteroauth/twitteroauth.php');
	//3 - Authentication
	/* Create a TwitterOauth object with consumer/user tokens. */
	$connection = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret);

	$query = 'https://api.twitter.com/1.1/search/tweets.json?q=%2301net&result_type=recent'; //Your Twitter API query
	$content = $connection->get($query);

	//var_dump($content);
	//var_dump($content->statuses[0]->text);
	//var_dump($content->statuses[0]->user);
	for($i = 0; $i < count($content->statuses); $i++){
		$pattern = "#\#{1}[0-9a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-]+#";
		preg_match_all($pattern, $content->statuses[$i]->text, $matches);
		print "user : ".$content->statuses[$i]->user->name;
		var_dump($matches[0]);
		echo "<br>";
	}
?>