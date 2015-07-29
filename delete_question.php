<?php
	include('config.php');

	$quesId = $_GET['question_id'];

	if ($quesId != null || $quesId != "") {
		$sql = "DELETE FROM choice_question WHERE question_id = ".$quesId;

		//echo $sql;

		$sql1 = "DELETE FROM question WHERE id = ".$quesId;

		//echo $sql1;
		//exit();

		$result = mysql_query($sql) or die(mysql_error());
		$result1 = mysql_query($sql1) or die(mysql_error());

		if ($result) {
			$response['successA'] = 1;
			$response['messageA'] = "Answers deleted successfully.";
		} else{
			$response['successA'] = 0;
			$response['messageA'] = "An error occurred while deleting data.";
		}

		if ($result1) {
			$response['successQ'] = 1;
			$response['messageQ'] = "\n\n\nQuestion deleted successfully.";
		} else{
			$response['successQ'] = 0;
			$response['messageQ'] = "\n\n\nAn error occurred while deleting data.";
		}
	} /*else {
			$response['success'] = 0;
			$response['message'] = "\n\n\nRequired field(s) is missing.";
	}*/

	echo json_encode($response);
?>