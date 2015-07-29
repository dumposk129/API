<?php
	// Add config.php
	include ('config.php');

	// Declaration
	$arr = array();

	// Feltch data from table story
	$sql = "SELECT s.id as id, s.title_name as title_name, (SELECT f.pic_path FROM frame f WHERE s.id = f.story_id ORDER BY f.id ASC LIMIT 1 ) AS pic_path
	FROM story s ORDER BY s.id ASC";

	// Condition to connect database
	$result = mysql_query($sql) or die(mysql_error());

	//Add id and title
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$row_arr['story_id'] = $row['id'];
		$row_arr['title_name'] = $row['title_name'];
		$row_arr['pic_path'] = $row['pic_path'];
		
		// Add arr and row_arr
		array_push($arr, $row_arr);
	}

	// Return json
	$response['success'] = 1;
	$response['story'] = $arr;
	echo json_encode($response);
?>