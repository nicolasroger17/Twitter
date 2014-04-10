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
                return $a['count'] < $b['count'];
            }
            usort($data, 'compareTweets');
            return $data;
        }
        function compareTags($a, $b){
            return $a['count'] < $b['count'];
        }
        usort($data, 'compareTags');
        return $data;
    }

    function createTweets($data){
        
    }
}
?>