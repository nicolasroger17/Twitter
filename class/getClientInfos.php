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
        return $this->createPage($data);
    }

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
            $i++;
            if($i > 10){
                break;
            }
        }
        $html .= ']);var options = {'.
                    'title: "Importance of tag",'.
                    'legend: { position: "none" }'.
                    '};'.
                    'var chart = new google.visualization.Histogram(document.getElementById("chart_div"));'.
                    'chart.draw(data, options);'.
                '}'.
            '</script>';
        return $html;
    }
}
?>