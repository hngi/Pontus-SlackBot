<?php

/**
 * Pontus Slackbot
 * 
 * Details: This file is part of the pontus slackbot file
 * Author: Josef
 * Modified By: titaro
 *
 */

// Database information
$dbname = "";
$user = "";
$host = "";
$password = "";

$conn = mysqli_connect("$host", "$user", "$password", "$dbname");

// Database prefix
define("PON_PREFIX","PON_");

?>
