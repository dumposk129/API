<?php
	include('config.php');

	$arr = array();
	
	$sql = "SELECT f.id as id, f.pic_path as pic_path, f.audio_path as audio_path, f.frame_order as frame_order FROM frame f INNER JOIN story s on f.story_id = s.id ORDER BY frame_order ASC";

	// Condition query to database
	$result = mysql_query($sql) or die(mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$row_arr['frame_id'] = $row['id'];
		$row_arr['pic_path'] = $row['pic_path'];
		$row_arr['audio_path'] = $row['audio_path'];
		$row_arr['frame_order'] = $row['frame_order'];

		// Add arr and row_arr
		array_push($arr, $row_arr);
	}

	// Return json
	$response['success'] = 1;
	$response['frame'] = $arr;
	echo json_encode($response);
?>