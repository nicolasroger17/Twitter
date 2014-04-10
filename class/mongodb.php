<?php
class MongodbModel{

    public $conBdd;
    public $db;

    function __construct(){
        $this->conBdd = new MongoClient();
    }

    /**
    * search for the tag in the database
    * if it doesn't exist, insert it
    * else, update his count
    * @param $page : name of the page to store in the right table
    * @param $tag : tag to manage and store
    **/
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

    /**
    * insert a tag in the right table
    * @param $tag : tag to insert in the table with a count of 1
    **/
    function insertTag($tag){
        $this->db->insert(array('tag' => $tag, 'count' => 1));
    }

    /**
    * update a tag in the right table
    * @param $tag : tag to update
    * @param $count : count to set
    **/
    function updateTag($tag, $count){
        $this->db->update(
            array('tag' => $tag),
            array('$set' => array('count' => $count))
        );
    }

    /**
    * insert some element of the tweet in the table
    * @param $content : element as an array
    **/
    function insertTweet($content){
        $this->db = $this->conBdd->selectCollection('twitter', 'tweets');
         $this->db->insert($content);
    }

    /**
    * return all the information from a specified table
    * @param $page : name of the table
    **/
    function getInfosFromTable($page){
        $this->db = $this->conBdd->selectCollection('twitter', $page);
        return $this->db->find();
    }
    
}
?>