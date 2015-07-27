<?php
	include ('config.php');
	
	$arr = array();

	$quesId = $_GET['question_id'];

	$sql = "DELETE FROM question WHERE id = ".$quesId;

	$result = mysql_connect($sql) or die(mysql_error());

	if (!result) {
		$response['success'] = 0;
		$response['message'] = "Can't delete data!";
	} else{
		$response['success'] = 1;
		$response["message"] = "Success";
	}

	mysql_close($sql);

	echo json_encode($response);
?>