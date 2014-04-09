<?php
class ManageReturnContent{
    
    private $model;
    public static $pageFollowed = array('@BFMTV', '@RTLFrance', '@canalplus', '@Le_Figaro');

    function __construct($table){
        require_once(ROOT.DS.'class'.DS.'Mongodb.php');
        $this->model = new MongodbModel($table);
    }

    function start($content){
        print 'tweet : '.$content['text'];
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

    function getPage($text){
        $pattern = "#\@{1}[0-9a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-]+#";
        preg_match_all($pattern, $text, $matches);
        foreach(self::$pageFollowed as $page){
            if(in_array($page, $matches[0])){
                return $page;
            }
        }
        return false;
    }

    function getTags($text){
        $pattern = "#\#{1}[0-9a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-]+#";
        preg_match_all($pattern, $text, $matches);
        return $matches[0];
    }

}
?>