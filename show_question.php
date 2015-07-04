<?php
	// Add config.php
	include('config.php');

	$arr = array();
	
	$qz_id = $_GET['qz_id'];
	if ($qz_id != null || $qz_id != "") {
		
		// Fletch Data from database
		$sql = "SELECT q.id as id, q.question_name as question_name FROM question q WHERE q.quiz_id = ".$qz_id;

		// Condition query to database
		$result = mysql_query($sql) or die(mysql_error());

		// Add all from Fletch data
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

			$choices = array();

			$row_arr['question_id'] = $row['id'];
			$row_arr['question_name'] = $row['question_name'];
			
			$sql2 = "SELECT cq.id as id, cq.answer_name as answer_name, cq.is_correct as is_correct, cq.order_id as order_id FROM choice_question cq WHERE cq.question_id = ".$row_arr['question_id'];
			$sql2 .= " ORDER BY order_id ASC"; 
			
			$result2 = mysql_query($sql2) or die(mysql_error());

			while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)) {
					$row_arr_answer['answer_id'] = $row2['id'];
					$row_arr_answer['order_id'] = $row2['order_id'];
					$row_arr_answer['answer_name'] = $row2['answer_name'];
					$row_arr_answer['is_correct'] = $row2['is_correct'];	

					array_push($choices, $row_arr_answer);	
			}	

			$row_arr['choices'] = $choices;

			array_push($arr, $row_arr);
		}

		// Return json
		$response['success'] = 1;
		$response['result'] = $arr;
		
		echo json_encode($response); 
	} else {
		$response['success'] = 0;
		$response['message'] = "Error. No qz_id in parameter";
		echo json_encode($response);
	}
?>