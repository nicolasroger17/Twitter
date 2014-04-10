<?php
class ManageReturnContent{
    
    private $model;
    public static $pageFollowed = array('@BFMTV', '@RTLFrance', '@canalplus', '@Le_Figaro', '@TF1', '@PSG');

    function __construct($table){
        require_once(ROOT.DS.'class'.DS.'Mongodb.php');
        $this->model = new MongodbModel();
    }

    /**
    * Method call when a tweet is received
    * @param $content : data from the tweet
    * this class contains debug because it is not use
    * by the client
    **/
    function start($content){
        print 'tweet : '.$content['text'];
        print_r($content);
        // find the source of the tweet and place the
        // linked hashtag in the table
        $page = $this->getPage($content['text']);
        if($page){
            print '<br>page found : '.$page.'<br>';
            $tags = $this->getTags($content['text']);
            print 'tags found : <br>';
            var_dump($tags);
            foreach($tags as $tag){
                echo "tag to handle : ".$tag."<br>";
                $this->model->manageTag($page, $tag);
            }
        }
            print '<br>retweet : '.$content['retweet_count'].'<br>';

        // add the tweet to the database
        $this->model->insertTweet(
            array(
                'id' => $content['id'],
                'created_at' => $content['created_at'],
                'text' => $content['text'], 
                'favorite_count' => $content['favorite_count'], 
                'retweet_count' => $content['retweet_count']
            )
        );
    }

    /**
    * determine the origin of the tweet by
    * finding the @ inside it
    * @param $text : text of the tweet to parse
    **/
    function getPage($text){
        $pattern = "#\@{1}[0-9a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-]+#";
        preg_match_all($pattern, $text, $matches);
        foreach(self::$pageFollowed as $page){
            // if the @ contained is from a followed page
            // return the name
            if(in_array($page, $matches[0])){
                return $page;
            }
        }
        // if nothing
        return false;
    }

    /**
    * determine the hashtags in the tweet
    * finding the # inside it
    * @param $text : text of the tweet to parse
    **/
    function getTags($text){
        $pattern = "#\#{1}[0-9a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-]+#";
        preg_match_all($pattern, $text, $matches);
        return $matches[0];
    }

}
?>