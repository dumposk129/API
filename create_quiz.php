<?php
 	include ('config.php'); 	// Add config file

 	$storyId = $_POST['s'];
 	$sql = "INSERT INTO quiz(story_id) VALUES (".$storyId.")";

	$result = mysql_query($sql) or die(mysql_error());

	$arr = array('result' => $result);
	echo json_encode($arr);
 ?>