<?php
	// Add config.php
	include('config.php');

	// Assign data
	$question_id = $_GET['qId'];
	for($i=1; $i<=4; $i++){
		$ans[$i] = $_GET['a'.$i]; //answer_name
		$isAns[$i] = $_GET['isA'.$i]; //isCorrect
	}
	if ($question_id != null or $question_id != "") {
		// Add Data into choice_question
		for ($j = 1; $j <= 4; $j++) { 
			$sql = "INSERT INTO choice_question(order_id, answer_name, is_correct, question_id) VALUES (".$j.", '".$ans[$j]."' , ".$isAns[$j]." , ".$question_id.")";
			$result = mysql_query($sql);
			// If not success
			if(!$result){
				$response['success'] = 0;
				$response['message'] = "sql: ".$sql." ".mysql_error();
				echo json_encode($response);
				exit();
			}
		}
		// Success and return
		$response['success'] = 1;
		$response['message'] = "Done";

		echo json_encode($response);
	} else{
		$response['success'] = 0;
		$response['message'] = "You don't have question_id in parameter";
		echo json_encode($response);
	}
?>