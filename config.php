<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "hng_login";
    //     making sure server responds to user
	$link = new mysqli($host,$user,$password);
	if (!$link) {
		die('Could not connect: ' . mysqli_error($link));
	}
    //     making sure user contain database
	$db_selected = mysqli_select_db($link, $dbname);
	if ($db_selected) {
         $conn = mysqli_connect("$host", "$user", "$password", "$dbname");
    }else{
        die('Could not find database, Kindly make the database accessible by this user');
    }

    
?>
