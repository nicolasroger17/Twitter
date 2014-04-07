<?php
class ManageReturnContent{
    
    private $model;

    function __construct(){
        require_once(ROOT.DS.'class'.DS.'model.php');
        $this->model = new Model();
    }

    function start($content){
        
        $this->model->insert(array(
            'created_at' => $content['created_at'], 
            'id' => $content['id'], 
            'text' => $content['text'], 
            'favorite_count' => $content['favorite_count'], 
            'retweet_count' => $content['retweet_count'] 
            ));
    }

}
?>