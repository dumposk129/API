<?php
	// Add config.php
	include('config.php');

	$quiz_id = $_GET['qId'];
	$question_name = $_GET['qName'];

	if (($quiz_id == null || $quiz_id == "") && ($question_name == null) ) {
		$response['success'] = 0;
		$response['message'] = "Null data (quiz id or question name)";
		echo json_encode($response);
		exit();
	} else{
		
		$sql = "INSERT INTO question(question_name, quiz_id) VALUES ('".$question_name."', ".$quiz_id.")";

		$result = mysql_query($sql);
		
		if(!$result){
			$response['success'] = 0;
			$response['message'] = mysql_error();
 		}else{
 			$response['success'] = 1;
 			$response['questionId'] = mysql_insert_id();
 		}
		echo json_encode($response);
		exit();
	}

?>