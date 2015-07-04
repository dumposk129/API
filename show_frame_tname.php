<?php
	// Add config.php
	include ('config.php');

	// Declaration
	$arr = array();

	// Feltch data from table frame and story
	$sql = "SELECT f.id as frame_id, s.title_name as title_name FROM frame f inner join story s on f.story_id = s.id";

	// Condition to connect database
	$result = mysql_query($sql) or die(mysql_error());

	//Add id and title
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$row_arr['frame_id'] = $row['frame_id'];
		$row_arr['title_name'] = $row['title_name'];
		
		// Add arr and row_arr
		array_push($arr, $row_arr);
	}

	// Return json
	$response['success'] = 1;
	$response['frame'] = $arr;
	echo json_encode($response);
?>