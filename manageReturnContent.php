<?php
class ManageReturnContent{
	
	private $content;
	function __construct($content){
		$this->content = $content;
		$this->content = "Array ( [created_at] => Sun Apr 06 13:08:52 +0000 2014 [id] => 4.5279507115947E+17 [id_str] => 452795071159472128 [text] => Amo el frío mañanero. Lástima que solo se de tan temprano cuando suelo dormir. #morning #coldays [source] => Twitter for iPhone [truncated] => [in_reply_to_status_id] => [in_reply_to_status_id_str] => [in_reply_to_user_id] => [in_reply_to_user_id_str] => [in_reply_to_screen_name] => [user] => Array ( [id] => 54469246 [id_str] => 54469246 [name] => MIR [screen_name] => frailesilla [location] => [url] => http://about.me/frailesilla [description] => I´m a froot Loop in a bowl full of cheerios !!!! Instagram --- @frailesilla [protected] => [followers_count] => 158 [friends_count] => 160 [listed_count] => 1 [created_at] => Tue Jul 07 06:12:55 +0000 2009 [favourites_count] => 10 [utc_offset] => -18000 [time_zone] => Central Time (US & Canada) [geo_enabled] => [verified] => [statuses_count] => 1200 [lang] => en [contributors_enabled] => [is_translator] => [is_translation_enabled] => [profile_background_color] => 1A1B1F [profile_background_image_url] => http://pbs.twimg.com/profile_background_images/378800000146374510/C1qiEYbx.jpeg [profile_background_image_url_https] => https://pbs.twimg.com/profile_background_images/378800000146374510/C1qiEYbx.jpeg [profile_background_tile] => [profile_image_url] => http://pbs.twimg.com/profile_images/3367943676/c533440bc8811b21488e3d1af5a13c12_normal.jpeg [profile_image_url_https] => https://pbs.twimg.com/profile_images/3367943676/c533440bc8811b21488e3d1af5a13c12_normal.jpeg [profile_banner_url] => https://pbs.twimg.com/profile_banners/54469246/1386708558 [profile_link_color] => A30D37 [profile_sidebar_border_color] => FFFFFF [profile_sidebar_fill_color] => 252429 [profile_text_color] => 666666 [profile_use_background_image] => 1 [default_profile] => [default_profile_image] => [following] => [follow_request_sent] => [notifications] => ) [geo] => [coordinates] => [place] => [contributors] => [retweet_count] => 0 [favorite_count] => 0 [entities] => Array ( [hashtags] => Array ( [0] => Array ( [text] => morning [indices] => Array ( [0] => 79 [1] => 87 ) ) [1] => Array ( [text] => coldays [indices] => Array ( [0] => 88 [1] => 96 ) ) ) [symbols] => Array ( ) [urls] => Array ( ) [user_mentions] => Array ( ) ) [favorited] => [retweeted] => [filter_level] => medium [lang] => es )";
		$this->start();
	}

	function start(){
		print_r($this->content);

		exit();
	}
}
?>