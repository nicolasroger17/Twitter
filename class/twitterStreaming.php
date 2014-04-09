<?php
require_once(ROOT.DS.'phirehose'.DS.'phirehose.php');
require_once(ROOT.DS.'phirehose'.DS.'oauthPhirehose.php');
require_once(ROOT.DS.'class'.DS.'manageReturnContent.php');

/**
 * Example of using Phirehose to display a live filtered stream using track words
 */
class TwitterStreaming extends OauthPhirehose
{
  static $manager = null;
  /**
   * Enqueue each status
   *
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
  define('TWITTER_CONSUMER_KEY', 'IWnNQRsCd2JF4p1jHL63Q');
  define('TWITTER_CONSUMER_SECRET', 'tDVLN26kyGL2F1evaDTIPYpSuiVTEUyJk9fdAA6YWFo');
  define('OAUTH_TOKEN', '2407736024-ye1xkvxwjrebpev7JMav3gs0zNPtsDTrHnLXvsV');
  define('OAUTH_SECRET', '9N6Za5vHB7YGzVs7tG0ujifR0qRwpJyq73tUlCo29VKRn');

  ini_set('max_execution_time', 560);
  $sc = new TwitterStreaming(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_FILTER);
  $sc->setTrack(manageReturnContent::$pageFollowed);
  $sc->consume();
