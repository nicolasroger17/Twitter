<h1>Twitter API</h1>
<?php
	$consumer_key='IWnNQRsCd2JF4p1jHL63Q'; //Provide your application consumer key
	$consumer_secret='tDVLN26kyGL2F1evaDTIPYpSuiVTEUyJk9fdAA6YWFo'; //Provide your application consumer secret
	$oauth_token = '2407736024-ye1xkvxwjrebpev7JMav3gs0zNPtsDTrHnLXvsV'; //Provide your oAuth Token
	$oauth_token_secret = '9N6Za5vHB7YGzVs7tG0ujifR0qRwpJyq73tUlCo29VKRn';

	require_once('APIs/twitteroauth-master/twitteroauth/twitteroauth.php');
	//3 - Authentication
	/* Create a TwitterOauth object with consumer/user tokens. */
	$connection = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret);

	$query = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=NOE_interactive&count=1'; //Your Twitter API query
	$content = $connection->get($query);
	var_dump($content);
?>