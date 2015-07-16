<?php
	include('config.php');
	$story_id = $_POST['sId'];
	$target_img_dir = "img/";
	$target_aud_dir = "audio/";
	$image_file = $target_img_dir . basename($_FILES["image"]["name"]);
	$audio_file = $target_aud_dir . basename($_FILES["audio"]["name"]);
	$img_uploadOk = 1;
	$audio_uploadOk = 1;
	$imageFileType = pathinfo($image_file,PATHINFO_EXTENSION);
	$audioFileType = pathinfo($audio_file,PATHINFO_EXTENSION);

	$saved_image_path = "";
	$saved_audio_path = "";

	$err_msg = "";

	    $check = getimagesize($_FILES["image"]["tmp_name"]); // Check if image file is a actual image or fake image
	    if($check !== false) {
	        $img_uploadOk = 1;
	    } else {
	        $err_msg = "File is not an image.";
	        $img_uploadOk = 0;
	    }

	    // Check if file already exists
		if (file_exists($image_file)) {
		    $err_msg = "Sorry, file already exists.";
		    $img_uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    $err_msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $img_uploadOk = 0;
		}

		// Check if $img_uploadOk is set to 0 by an error
		if ($img_uploadOk == 0) {
		    $err_msg .= "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_file)) {
		        // echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		       	$saved_image_path = $image_file;
		       	echo "Image Upload Successfully";

		    } else {
		         $err_msg = "Sorry, there was an error uploading your file.";
		         
		    }
		}
		echo $err_msg;
		
		//*** Audio File
		$err_msg = ""; 

	    // Check if audio file already exists
		if (file_exists($audio_file)) {
		    $err_msg = "Sorry, file already exists.";
		    $audio_uploadOk = 0;
		}
		// Check if $img_uploadOk is set to 0 by an error
		if ($audio_uploadOk == 0) {
		    $err_msg = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["audio"]["tmp_name"], $audio_file)) {
		       	$saved_audio_path = $audio_file;
		       	echo "Audio Complete";

		    } else {
		        $err_msg = "Sorry, there was an error uploading your audio file.";
		    }
		}

		echo $err_msg;

		if ($saved_audio_path != "" && $saved_image_path != "") {
			$sql = "INSERT INTO frame(pic_path, audio_path, story_id) VALUES ('".$saved_image_path."', '".$saved_audio_path."', ".$story_id.")";
			$result =  mysql_query($sql);
			echo "Saved to DB";
			http_response_code(200);
		}else{
			http_response_code(500);
			echo "Can't save to DB";
		}
?>