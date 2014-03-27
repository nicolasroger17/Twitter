<?php
class Twitter{

	private $consumer_key='IWnNQRsCd2JF4p1jHL63Q'; //Provide your application consumer key
	private $consumer_secret='tDVLN26kyGL2F1evaDTIPYpSuiVTEUyJk9fdAA6YWFo'; //Provide your application consumer secret
	private $oauth_token = '2407736024-ye1xkvxwjrebpev7JMav3gs0zNPtsDTrHnLXvsV'; //Provide your oAuth Token
	private $oauth_token_secret = '9N6Za5vHB7YGzVs7tG0ujifR0qRwpJyq73tUlCo29VKRn';
	private $connection;

	function __construct(){
		require_once('APIs/twitteroauth-master/twitteroauth/twitteroauth.php');
		$this->connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $this->oauth_token, $this->oauth_token_secret);
	}
	
	function request($url){
		$query = $url; //Your Twitter API query
		return $this->connection->get($query);
	}

	function getInfo($content){
		for($i = 0; $i < count($content->statuses); $i++){
			$pattern = "#\#{1}[0-9a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-]+#";
			preg_match_all($pattern, $content->statuses[$i]->text, $matches);
			print "user : ".$content->statuses[$i]->user->name;
			var_dump($matches[0]);
			echo "<br>";
		}
	}
}
?>