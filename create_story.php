<?php
	include('config.php');

	$title_name = $_GET['title_name'];
	
	$sql = "INSERT INTO story(title_name) VALUES ('".$title_name."')";

	$result = mysql_query($sql) or die(mysql_error());

	if(!$result){
			$response['success'] = 0;
			$response['message'] = mysql_error();
 	}else{
 			$response['success'] = 1;
 			$response['storyId'] = mysql_insert_id();
 	}
	echo json_encode($response);
	exit();
?>