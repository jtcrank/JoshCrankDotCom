<?php

/*  Copyright (C) <2015>
*  Josh Crank - crank.5@wright.edu
*  This program is free software: you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation, either version 3 of the License, or
*  (at your option) any later version.
*
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  You should have received a copy of the GNU General Public License
*  along with this program.  If not, see <http://www.gnu.org/licenses/>.

-------------------------------------------------------------------------
File Description:
This script utilizes the TwitterAPIExchange library which communicates with
Twitter to obtain tweets related to @jtcrank.

Dependencies:
* TwitterAPIExchange.php
* Auth.conf
-------------------------------------------------------------------------*/

ini_set('display_errors', 1);
require_once("php/TwitterAPIExchange.php");

// Configure OAuth keys...
// Do not worry, this is normally read through a rooted file.  This is here for simplicity's
// sake. Live distribution has this hidden and utilizes a config file.
$settings = array(
        'oauth_access_token' => "XXXXXXXXXXXXXXXXXXXXX",
        'oauth_access_token_secret' => "XXXXXXXXXXXXXXXXXXXXX",
        'consumer_key' => "XXXXXXXXXXXXXXXXXXXXX",
        'consumer_secret' => "XXXXXXXXXXXXXXXXXXXXX"
);

// Utilize Twitter API
$url = 'https://api.twitter.com/1.1/statuses/mentions_timeline.json';
$requestMethod = 'GET';
$getfield = '?count=12';

// Grab tweets upon authorization
$twitter = new TwitterAPIExchange($settings);
$tweets = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest());

$tweet_container = array();
$ID = 1;

// Construct the array of tweets pulled from the Twitter API for easier JSON encoding.
// This simply formats the data into an associative array, which functions better with
// the JSON encoding.
foreach($tweets as $tweet)
{
   $user = $tweet->user->screen_name;
   $text = $tweet->text;
   $timestamp = $tweet->created_at;

   $t = array("ID" => strval($ID), "user" => $user, "text" => $text, "timestamp" => $timestamp);
   $tweet_container[] = $t;
   $t++;
}

echo json_encode($tweet_container);
?>
