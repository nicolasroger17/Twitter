<?php

/**
 * Use the model to get informations from the database
 * And return element in html to display to the client.
**/
class GetClientInfos{
    
    /**
    * database object
    **/
    private $model;

    function __construct($table){
        require_once(ROOT.DS.'class'.DS.'Mongodb.php');
        $this->model = new MongodbModel($table);
    }

    /**
    * ask the right document in the database
    * and get his informations
    * @param $table : name of the table
    **/
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
        return $this->createPage($data);
    }

    /**
    * create a tweet bloc in html
    * @param $data : data to use
    **/
    function createTweets($data){
        $html = "";
        foreach($data as $tweet){
            $html .= "<div class='tweetContainer'>".
                        "<p class='hour'>".$tweet['created_at']."</p>".
                        "<p class='tweet'>".$tweet['text']."</p>".
                        "<div class='bottom'>".
                            "<p class='retweet'>Retweet ".$tweet['retweet_count']."</p>".
                            "<p class='favorite'>Favorite ".$tweet['favorite_count']."</p>".
                        "</div>".
                     "</div>";
        }
        return $html;
    }

    /**
    * create a bloc for an hashtag and his count in html
    * @param $data : data to use
    **/
    function createPage($data){
        $html = "";
        $html .= $this->createChart($data);
        foreach($data as $tag){
            $html .= "<div class='tag'>".
                        "<p class='tagName'>".$tag['tag']."</p>".
                        "<p class='tagCount'>".$tag['count']."</p>".
                     "</div>";
        }
        return $html;
    }

    /**
    * create the chart using google charts api
    * @param $data : data to use
    **/
    function createChart($data){
        $i = 0;
        $html = '<script type="text/javascript">'.
                'google.load("visualization", "1", {packages:["corechart"]});'.
                'google.setOnLoadCallback(drawChart);'.
                'function drawChart() {'.
                    'var data = google.visualization.arrayToDataTable(['.
                    '["Tag", "Count"],';
        foreach($data as $tag){
            $html .= '["'.$tag['tag'].'", '.$tag['count'].'],';
        }
        $html .= ']);var options = {'.
                    'title: "Importance of tag",'.
                    'legend: { position: "none" },'.
                    'histogram: {bucketSize: 1},'.
                    'chartArea: {height: 400},'.
                    'height: 500,'.
                    'width: 1200,'.
                    '};'.
                    'var chart = new google.visualization.Histogram(document.getElementById("chart_div"));'.
                    'chart.draw(data, options);'.
                '}'.
            '</script>';
        return $html;
    }
}
?>