<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			if(move_uploaded_file($_FILES["image"]["tmp_name"],"myfile/".$_FILES["image"]["name"])){
				echo "Copy/Upload Complete<br>";
   				$response['file_name'] = "http://dump.geozigzag.com/api/myfile/".$_FILES["image"]["name"];

				//*** Insert Record ***//
				include ('config.php'); 	// Add config file

				$name = $_POST["title_name"];
				$des = $_POST["description"];
				$sql = "INSERT INTO story ";
				$sql .="(image_name, audio_name, title_name, description) VALUES ('".$_FILES["uploadedfile"]["name"]."','".$response['file_name']."',('$name'),('$des'))";
				$objQuery = mysql_query($sql);		
			}
		?>
	</body>
</html>