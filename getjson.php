<?php

	include ('config.php'); 	// Add config file

	("SET NAMES 'utf8' COLLATE 'utf8_general_ci';");
	date_default_timezone_set('Asia/Bangkok'); 
	$CreateDate = date("Y-m-d H:i:s");  

	$sql = "SELECT * FROM story WHERE id ORDER BY id";
	$objQuery = mysql_query($sql);
	$intNumField = mysql_num_fields($objQuery);
	$resultArray = array();
	while($obResult = mysql_fetch_array($objQuery)){
		$arrCol = array();
		for($i = 0; $i < $intNumField; $i++){
			$arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
		}
		array_push($resultArray,$arrCol);
	}	
	echo json_encode($resultArray);
?>