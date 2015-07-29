<?php
	// Add config.php
	include ('config.php');

	// Declaration
	$arr = array();

	// Feltch data from table quiz and story
	$sql = "SELECT q.id as quiz_id, s.title_name as title_name,(SELECT f.pic_path FROM frame f WHERE f.story_id = s.id ORDER BY f.id ASC LIMIT 1) as pic_path FROM quiz q inner join story s on q.story_id = s.id";

	// Condition to connect database
	$result = mysql_query($sql) or die(mysql_error());

	//Add id and title
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$row_arr['quiz_id'] = $row['quiz_id'];
		$row_arr['title_name'] = $row['title_name'];
		$row_arr['pic_path'] = $row['pic_path'];
			
		// Add arr and row_arr
		array_push($arr, $row_arr);
	}

	// Return json
	$response['success'] = 1;
	$response['quiz'] = $arr;
	echo json_encode($response);
?>