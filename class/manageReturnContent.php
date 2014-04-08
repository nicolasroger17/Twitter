<?php
class ManageReturnContent{
    
    private $model;


    function __construct(){
        require_once(ROOT.DS.'class'.DS.'model.php');
        $this->model = new Model();
    }

    function start($content){
        
        $this->model->insert(array(
            'created_at' => date( "Y-m-d", strtotime($content['created_at'])),
            'id' => $content['id'], 
            'text' => $content['text'], 
            'favorite_count' => $content['favorite_count'], 
            'retweet_count' => $content['retweet_count']
            ));
    }

    function filter (){
        $data = $this->model->getInfo();
        var_dump($data);
    }
    /*$sth = $this->db->prepare('SELECT likes_products.id
                        FROM likes_products
                        WHERE likes_products.product_id = :id_product and likes_products.user_id = :user_id'
                        );
        $sth->bindParam(':user_id', $user_id);
        $sth->bindParam(':id_product', $id_product);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);*/

}
?>