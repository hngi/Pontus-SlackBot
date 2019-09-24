<?php
if($_POST['data'] != ''){
	$from_get = $_POST['data'];
	// $from_get = "<@UN9PP45GA> save my convo here";
	$arr1 = explode(' ',trim($from_get));
	$first = $arr1[0];
	$first_1 = str_replace("<@", '', $first);
	$first_2 = str_replace(">", '', $first_1);
	$slack_user_id = $first_2;
	echo "Slack user id is ".$slack_user_id;
	echo "<br>";
	echo "Slack user message is ".str_replace($first, "", $_POST['data']);
	
}
?>