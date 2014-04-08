<?php
class Model{

    public static $connections = array();
    public $db;

    function __construct(){
        $conf = array(
                'host'         => 'localhost',
                'database'     => 'twitter',
                'login'        => 'root',
                'password'     => ''
        );
        try{
            //echo 'mysql:host='.$conf['host'].';dbname='.$conf['database'],$conf['login'],$conf['password'];           
            $pdo = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'],
                           $conf['login'],
                           $conf['password'],
                           array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
                        );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->db = $pdo;
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }

    function insert($data){
        $req = $this->db->prepare('INSERT INTO tweets (id, date, text, retweeted, favorited)
                                    VALUES (:id,:date,:text,:retweeted,:favorited)'
                                );
         $req->bindParam(':id', $data['id']);
         $req->bindParam(':date', $data[strtotime('created_at')]);
         $req->bindParam(':text', $data['text']);
         $req->bindParam(':retweeted', $data['retweet_count']);
         $req->bindParam(':favorited', $data['favorite_count']);
         $req->execute();
    }
    
}
?>