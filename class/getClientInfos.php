<?php
class GetClientInfos{
    
    private $model;
    public static $pageFollowed = array('@BFMTV', '@RTLFrance', '@canalplus', '@Le_Figaro', '#TF1');

    function __construct($table){
        require_once(ROOT.DS.'class'.DS.'Mongodb.php');
        $this->model = new MongodbModel($table);
    }

    function infosFromTable($table){
        $data = iterator_to_array($this->model->getInfosFromTable($table));
        if($table == 'tweets'){
            function compareTweets($a, $b){
                return $a['retweet_count'] < $b['retweet_count'];
            }
            usort($data, 'compareTweets');
            return $this->createTweets($data);
        }
        function compareTags($a, $b){
            return $a['count'] < $b['count'];
        }
        usort($data, 'compareTags');
        return $data;
    }

    function createTweets($data){
        $html = "";
        foreach($data as $tweet){
            $html .= "<div class='tweetContainer'>".
                        "<p class='hour'>".$tweet['created_at']."</p>".
                        "<p class='tweet'>".$tweet['text']."</p>".
                        "<div class='bottom'>".
                            "<p class='retweet'>".$tweet['retweet_count']."</p>".
                            "<p class='favorite'>".$tweet['favorite_count']."</p>".
                        "</div>".
                     "</div>";
        }
        return $html;
    }
}
?>