<?php
	// Add config.php
	include ('config.php');

	// Declaration
	$arr = array();

	// Feltch data from table frame and story
	$sql = "SELECT id, title_name FROM story";

	// Condition to connect database
	$result = mysql_query($sql) or die(mysql_error());

	//Add id and title
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$row_arr['story_id'] = $row['id'];
		$row_arr['title_name'] = $row['title_name'];
		
		// Add arr and row_arr
		array_push($arr, $row_arr);
	}

	// Return json
	$response['success'] = 1;
	$response['story'] = $arr;
	echo json_encode($response);
?>