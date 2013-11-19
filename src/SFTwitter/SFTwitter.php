<?php
 /**
 * Twitter
 *
 * A wrapper class for the Twitter API integrated to Symfony 2
 *
 * @package		SFTwitter-Bungle
 * @subpackage	Vendor
 * @category	Library
 * @author		Achraf Soltani <soltani.achraf@gmail.com>
 * @link		http://www.achrafsoltani.com/
 * @date        11/15/2013
 */



namespace SFTwitter;
require_once('twitteroauth/twitteroauth.php');


class SFTwitter
{
    private $CONSUMER_KEY;
    private $CONSUMER_SECRET;
    private $ACCESS_TOKEN;
    private $ACCESS_TOKEN_SECRET;

    protected $_connection;

    public function __construct($_CONSUMER_KEY, $_CONSUMER_SECRET, $_ACCESS_TOKEN, $_ACCESS_TOKEN_SECRET)
    {
        $this->CONSUMER_KEY = $_CONSUMER_KEY;
        $this->CONSUMER_SECRET = $_CONSUMER_SECRET;
        $this->ACCESS_TOKEN = $_ACCESS_TOKEN;
        $this->ACCESS_TOKEN_SECRET = $_ACCESS_TOKEN_SECRET;

        $this->_connection = $this->_connect();
    }

    private function _connect()
    {
        return new \TwitterOAuth($this->CONSUMER_KEY, $this->CONSUMER_SECRET, $this->ACCESS_TOKEN, $this->ACCESS_TOKEN_SECRET);
    }

    public function getStatuses($max_number = 5, $excluse_replies = true)
    {
        $tweets = $this->_connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?count=".$max_number."&exclude_replies=".$excluse_replies);
        return json_encode($tweets);
    }
} 