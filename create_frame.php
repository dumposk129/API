<?php
	include('config.php');
	
	$story_id = $_POST['sId'];
	$path_pic = basename($_FILES["file-image"]['name']);
	$path_audio = $_FILES["file-audio"]['tmp_name'];


	$filename = $_FILES["file-image"]['name'];
	$filename1 = $_FILES["file-audio"]['name'];


	$accept = array("jpg","jpeg", "png", "mp3", "mp4");
	$type = $_FILES["file-image"]['type'];
	$type1 = pathinfo($_FILES["file-audio"]['type'], PATHINFO_EXTENSION);		

	echo $story_id;
	echo $path_pic;
	echo $path_audio;
	exit();

	$upload= 'img/';

	$upload1 = 'audio/';

	if (move_uploaded_file($_FILES["file-image"]['tmp_name'], $upload.$filename.".jpg")) {
		$success_img = true;

		$img_path = $filename.".jpg";
		echo "Uploaded image";
	}else{
		$success_img = false;		
		echo "Failed upload image";
	}

	if (move_uploaded_file($_FILES["file-audio"]['tmp_name'], $upload1.$filename1.".mp4")) {
		$success_aud = true;

		$aud_path = $filename1.".mp4";
		echo "Uploaded audio";
	}else{
		$success_aud = false;		
		echo "Failed upload audio";
	}

	if ($success_img && $success_aud) {
		$sql = "INSERT INTO frame(pic_path, audio_path, story_id) VALUES ('".$img_path."', '".$aud_path."', ".$story_id.")";
		$result =  mysql_query($sql);
		echo "Success";
	}
?>