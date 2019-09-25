<?php

/**
 * Pontus Slackbot
 * 
 * Details: This file is part of the pontus slackbot file
 * Author: titaro
 *
 */

// Attempt to get it automatically
if(!defined('PON_DIR'))
{
 define('PON_DIR', dirname(dirname(__FILE__))."/");
}

// Load the config file
require_once PON_DIR."config.php";

// Load the database file
require_once PON_DIR."sys/database/MySqli.php";

// Database connection
$db = new MySqliServer($host, $user, $password, $dbname);

?>