<?php
	// Add config.php
	include('config.php');

	$arr = array();

	$quesId = $_GET['question_id'];

	/*if (is_null($quesId) || $quesId == '') {
		//Return json
		$response['success'] = 0;
		$response['message'] = "Error. No question_id in parameter";
		echo json_encode($response);
		exit();
	}
*/
	if ($quesId != null || $quesId != "") {
		// Fletch Data from database
		$sql = "SELECT qu.question_name as question_name, cq.answer_name as answer_name, cq.is_correct as is_correct, cq.id as answer_id FROM question qu";
		$sql .= " inner join choice_question cq on cq.question_id = qu.id WHERE cq.question_id = ".$quesId;

		// Condition connect to database
		$result = mysql_query($sql) or die(mysql_error());

		// Add id and question_name
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$row_arr['answer_id'] = $row['answer_id'];
			$row_arr['answer_name'] = $row['answer_name'];
			$row_arr['question_name'] = $row['question_name'];
			$row_arr['is_correct'] = $row['is_correct'];
		
			array_push($arr, $row_arr);
		}

		//Return json
		$response['success'] = 1;
		$response['answer'] = $arr;
		echo json_encode($response); 
	}else {
		//Return json
		$response['success'] = 0;
		$response['message'] = "Error. No question_id in parameter";
		echo json_encode($response);
		exit();
	}
?>