<?php
class MongodbModel{

    public $conBdd;
    public $db;

    function __construct($table){
        $this->conBdd = new MongoClient();
    }

    function manageTag($page, $tag){
        $this->db = $this->conBdd->selectCollection('twitter', $page);
        $data = iterator_to_array($this->db->find(array('tag' => $tag)));
        print_r("data found ");
        var_dump($data);
        if(empty($data)){
            echo "insert<br>";
            $this->insertTag($tag);
        }
        else{
            echo "update tag : ".$tag."<br>";
            $count = 1;
            foreach($data as $c){
                echo "count before : ".$c['count']."<br>";
                $count = $c['count'] + 1;
            }
            echo "count after : ".$count."<br><br>";
            $this->updateTag($tag, $count);
        }
    }

    function insertTag($tag){
        $this->db->insert(array('tag' => $tag, 'count' => 1));
    }

    function updateTag($tag, $count){
        $this->db->update(
            array('tag' => $tag),
            array('$set' => array('count' => $count))
        );
    }

    function insertTweet($content){
        $this->db = $this->conBdd->selectCollection('twitter', 'tweets');
         $this->db->insert($content);
    }

    function getInfosFromTable($page){
        $this->db = $this->conBdd->selectCollection('twitter', $page);
        return $this->db->find();
    }
    
}
?>