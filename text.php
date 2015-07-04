<?php
	// Add config.php
	include('config.php');
?>

<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<p>&nbsp;</p>
		<p align="center"><a href="admin/admin_page.php">Back to admin Page </a></p>
		<p align="left"><a href="upload1.php">+ Add Deal</a></p>
		<table width="100%" border="1" align="center">
  			<?php
				$sql = mysql_query("select * from story  ORDER BY id DESC limit 1");
				while($row = mysql_fetch_array($sql)){?>
  				<tr>
					<td width="70" height="24"><?php echo $row['id'] ; ?></td>
					<td width="128"><?php echo $row['title_name'] ; ?></td>
					<td width="132"><?php echo $row['description'] ; ?></td>
					<td width="122"><a href="delete.php<?php echo '?id='.$row['user_id']; ?>">delete</a></td>
					<td width="47"><a href="edit.php<?php echo '?id='.$row['user_id']; ?>">Edit</a></td>
					<td width="82"><a href="detail.php<?php echo '?id='.$row['user_id']; ?>">More Detail</a></td>
				</tr>
			<?php }?>
		</table>
		<p>&nbsp;</p>
	</body>
</html> 

<?php
	// Add config.php
	include('config.php');
	
	// SET Date
	("SET NAMES 'utf8' COLLATE 'utf8_general_ci';");
	date_default_timezone_set('Asia/Bangkok'); 
	$create_date = date("Y-m-d H:i:s");  

	echo $row['title_name'];
	echo $row_["description"];

	$name = $_POST["title_name"];
	$des = $_POST["description"];
	
	/*** Insert ***/
	$sql = "UPDATE story SET title_name ='$name', description = '$des' WHERE id ORDER BY id DESC";

	if (mysql_query($sql) === TRUE) {
		// $sql2 = "INSERT INTO quiz (story_id) VALUES (id);";
		// if (mysql_query($sql2) === TRUE) {
		// 	echo "created a quiz successfully";
		// }else {
		// 	echo "Error creating a quiz \n story_id: id error: ". mysql_error();
		// }
		
    	echo "Record updated successfully";
		echo $_FILES["uploadedfile"]["name"];
	} else {
    	echo "Error updating record: " . mysql_error();
	} 
?>