<?php
class ManageReturnContent{
	
	private $content;
	function __construct($content){
		$this->content = $content;
		$this->start();
	}

	function start(){
		$content = $this->text_to_array("Array ( [created_at] => Sun Apr 06 13:19:34 +0000 2014 [id] => 4.5279776443152E+17 [id_str] => 452797764431523840 [text] => having your body wake up naturally is like the best well rested feeling #fullnightssleep #morning #morningsun #breakfast [source] => Twitter for Android [truncated] => [in_reply_to_status_id] => [in_reply_to_status_id_str] => [in_reply_to_user_id] => [in_reply_to_user_id_str] => [in_reply_to_screen_name] => [user] => Array ( [id] => 337876211 [id_str] => 337876211 [name] => Beardo the Viking [screen_name] => TylerFinfrock [location] => [url] => [description] => I gotta draw til my hands are raw! Be creative til i need defibrulated! [protected] => [followers_count] => 15 [friends_count] => 39 [listed_count] => 0 [created_at] => Mon Jul 18 18:34:09 +0000 2011 [favourites_count] => 0 [utc_offset] => [time_zone] => [geo_enabled] => [verified] => [statuses_count] => 36 [lang] => en [contributors_enabled] => [is_translator] => [is_translation_enabled] => [profile_background_color] => C0DEED [profile_background_image_url] => http://abs.twimg.com/images/themes/theme1/bg.png [profile_background_image_url_https] => https://abs.twimg.com/images/themes/theme1/bg.png [profile_background_tile] => [profile_image_url] => http://pbs.twimg.com/profile_images/443752044508110848/DQAmjWIk_normal.jpeg [profile_image_url_https] => https://pbs.twimg.com/profile_images/443752044508110848/DQAmjWIk_normal.jpeg [profile_banner_url] => https://pbs.twimg.com/profile_banners/337876211/1394812906 [profile_link_color] => 0084B4 [profile_sidebar_border_color] => C0DEED [profile_sidebar_fill_color] => DDEEF6 [profile_text_color] => 333333 [profile_use_background_image] => 1 [default_profile] => 1 [default_profile_image] => [following] => [follow_request_sent] => [notifications] => ) [geo] => [coordinates] => [place] => [contributors] => [retweet_count] => 0 [favorite_count] => 0 [entities] => Array ( [hashtags] => Array ( [0] => Array ( [text] => fullnightssleep [indices] => Array ( [0] => 72 [1] => 88 ) ) [1] => Array ( [text] => morning [indices] => Array ( [0] => 89 [1] => 97 ) ) [2] => Array ( [text] => morningsun [indices] => Array ( [0] => 98 [1] => 109 ) ) [3] => Array ( [text] => breakfast [indices] => Array ( [0] => 110 [1] => 120 ) ) ) [symbols] => Array ( ) [urls] => Array ( ) [user_mentions] => Array ( ) ) [favorited] => [retweeted] => [filter_level] => medium [lang] => en )");
		
		var_dump($content); 
		exit();
	}

	function text_to_array($str) {

        //Initialize arrays
        $keys = array();
        $values = array();
        $output = array();

        //Is it an array?
        if( substr($str, 0, 5) == 'Array' ) {

            //Let's parse it (hopefully it won't clash)
            $array_contents = substr($str, 7, -2);
            $array_contents = str_replace(array('[', ']', '=>'), array('#!#', '#?#', ''), $array_contents);
            $array_fields = explode("#!#", $array_contents);

            //For each array-field, we need to explode on the delimiters I've set and make it look funny.
            for($i = 0; $i < count($array_fields); $i++ ) {

                //First run is glitched, so let's pass on that one.
                if( $i != 0 ) {

                    $bits = explode('#?#', $array_fields[$i]);
                    if( $bits[0] != '' ) $output[$bits[0]] = $bits[1];

                }
            }

            //Return the output.
            return $output;

        } else {

            //Duh, not an array.
            echo 'The given parameter is not an array.';
            return null;
        }
    }
}
?>