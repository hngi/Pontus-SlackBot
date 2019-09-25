<?php

/**
 * Pontus Slackbot
 * 
 * Details: This file is part of the pontus slackbot file
 * Author: Ugbogu Justice
 * Modified By: titaro
 *
 */

session_start();

// Lets include some important files here
require_once 'sys/Main.php';

if($_POST['data'] != '')
{
 $from_get = $_POST['data'];

 // $from_get = "<@UN9PP45GA> save my convo here";
 $arr1 = explode(' ',trim($from_get));
 $first = $arr1[0];
 $first_1 = str_replace("<@", '', $first);
 $first_2 = str_replace(">", '', $first_1);
 $slack_user_id = $first_2;
 
 // Obtained from welcome page once signed in
 $email =  $_SESSION['pontus_user_email'];

 // Obtained from bot once a message is made by slack user
 $conversation = trim(str_replace($first, "", $from_get));

 // Obtain bot message
 $bot = $_POST['newMessage'];

 // Create our database table
 $db->query("CREATE TABLE IF NOT EXISTS `".PON_PREFIX."convo` (
    `cid` int(11) NOT NULL AUTO_INCREMENT,
    `user_email` varchar(225) NOT NULL,
    `user_convo` varchar(225) NOT NULL,
    `bot_convo` varchar(225) NOT NULL,
    PRIMARY KEY (`cid`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");

 // Make inserts
 $db->query("INSERT INTO `".PON_PREFIX."convo` (`user_email`, `user_convo`, `bot_convo`) VALUES
('$email', '$conversation', '$bot');");
}

?>