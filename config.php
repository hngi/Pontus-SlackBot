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
$dbname = "wdc";
$user = "root";
$host = "localhost";
$password = "moimii";

$conn = mysqli_connect("$host", "$user", "$password", "$dbname");

// Database prefix
define("PON_PREFIX","PON_");

?>