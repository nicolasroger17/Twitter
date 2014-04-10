<?php
require_once(ROOT.DS.'phirehose'.DS.'phirehose.php');
require_once(ROOT.DS.'phirehose'.DS.'oauthPhirehose.php');
require_once(ROOT.DS.'class'.DS.'manageReturnContent.php');

/**
 * this class extends OauthPhirehose
 * it is a open source API that make the relation from
 * twitter and our code
 * we only have to modify the code in the method enqueueStatus
 */
class TwitterStreaming extends OauthPhirehose
{
  static $manager = null;
  /**
   * Enqueue each status
   * this method is called when a tweet is received
   * @param string $status
   */
  public function enqueueStatus($status)
  {
    /*
     * In this simple example, we will just display to STDOUT rather than enqueue.
     * NOTE: You should NOT be processing tweets at this point in a real application, instead they should be being
     *       enqueued and processed asyncronously from the collection process.
     */
    $data = json_decode($status, true);
    self::$manager->start($data);
    
  }
}
  /**
  * declare the keys for the API
  **/
  define('TWITTER_CONSUMER_KEY', 'IWnNQRsCd2JF4p1jHL63Q');
  define('TWITTER_CONSUMER_SECRET', 'tDVLN26kyGL2F1evaDTIPYpSuiVTEUyJk9fdAA6YWFo');
  define('OAUTH_TOKEN', '2407736024-ye1xkvxwjrebpev7JMav3gs0zNPtsDTrHnLXvsV');
  define('OAUTH_SECRET', '9N6Za5vHB7YGzVs7tG0ujifR0qRwpJyq73tUlCo29VKRn');

  /**
  * Duration of the request
  **/
  ini_set('max_execution_time', 600);
  $sc = new TwitterStreaming(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_FILTER);
  // set tracks from the array declared in the ManageReturnContent class
  $sc->setTrack(manageReturnContent::$pageFollowed);
  // starts the connection to Twitter
  $sc->consume();