<?php
require_once('phirehose/lib/Phirehose.php');
require_once('phirehose/lib/OauthPhirehose.php');
require_once('manageReturnContent.php');

/**
 * Example of using Phirehose to display a live filtered stream using track words
 */
class TwitterStreaming extends OauthPhirehose
{
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
    new ManageReturnContent($data);
  }
}

define('TWITTER_CONSUMER_KEY', 'IWnNQRsCd2JF4p1jHL63Q');
define('TWITTER_CONSUMER_SECRET', 'tDVLN26kyGL2F1evaDTIPYpSuiVTEUyJk9fdAA6YWFo');
define('OAUTH_TOKEN', '2407736024-ye1xkvxwjrebpev7JMav3gs0zNPtsDTrHnLXvsV');
define('OAUTH_SECRET', '9N6Za5vHB7YGzVs7tG0ujifR0qRwpJyq73tUlCo29VKRn');

// Start streaming
$sc = new TwitterStreaming(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_FILTER);
$sc->setTrack(array('#TF1'));
$sc->consume();