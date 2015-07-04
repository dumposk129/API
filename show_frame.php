<?php
	include('config.php');

	$arr = array();
	$sId = $_GET['sId'];
	
	$sql = "SELECT id, pic_path, audio_path FROM frame WHERE story_id = ".$sId. " ORDER BY id ASC";

	// Condition query to database
	$result = mysql_query($sql) or die(mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$row_arr['frame_id'] = $row['id'];
		$row_arr['pic_path'] = $row['pic_path'];
		$row_arr['audio_path'] = $row['audio_path'];
		
		// Add arr and row_arr
		array_push($arr, $row_arr);
	}

	// Return json
	$response['success'] = 1;
	$response['frame'] = $arr;
	echo json_encode($response);
?>