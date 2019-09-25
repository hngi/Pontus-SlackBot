<?php
session_start();

// neccessary includes here
require 'require your db.php here';

if($_POST['data'] != ''){
	$from_get = $_POST['data'];
	// $from_get = "<@UN9PP45GA> save my convo here";
	$arr1 = explode(' ',trim($from_get));
	$first = $arr1[0];
	$first_1 = str_replace("<@", '', $first);
	$first_2 = str_replace(">", '', $first_1);
	$slack_user_id = $first_2;
	
	$email =  $_SESSION['pontus_user_email'];//obtained from welcome page once signed in
	$conversation = trim(str_replace($first, "", $from_get));//obtained from bot once a message is made by slack user

	$tbl = "conversation";//conversation_table_name_here
	$con = '';//db_mysqli_connnection_hook_here
	$tbl_id_name = "convo_id";//table id column name here
	$email_column_name = "user_email";//table email column name here
	$conversation_column_name = "user_conversation";//table conversation column name here
	// fill free to add more columns,remember to put them in the $theTableStructure and aswell provide data to feed such column(s) when $queryTable is called
	
	$theTableStructure = "CREATE TABLE `$tbl` (
			  `$tbl_id_name` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY  NOT NULL,
			  `$email_column_name` varchar(225) NOT NULL,
			  `$conversation_column_name` varchar(225) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	$queryTable = "INSERT INTO $tbl(`$email_column_name`,`$conversation_column_name`) VALUES('$email','$conversation')";

	// Checking if conversation has been made
	function conversation($con_string,$tbl,$tbl_structure,$queryTable){
		$sql_check_tbl_existance = $con_string->query("SELECT 1 FROM $tbl Limit 1");
		if ($sql_check_tbl_existance === FALSE) {
			// making table if not exist
			$con_string->query($tbl_structure);   
		}
    	// inserting conversation
    	$con_string->query($queryTable);
	}

	conversation(
		$con,
		$tbl,
		$theTableStructure,
		$queryTable
	);
	
}
?>