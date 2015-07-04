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
				$sql=mysql_query("select * from story  ORDER BY id DESC limit 1");
				while($row=mysql_fetch_array($sql)){
			?>
 			<tr>
				<td width="70" height="24"><?php echo $row['id'] ; ?></td>
				<td width="128"><?php echo $row['image_name'] ; ?></td>
				<td width="132"><?php echo $row['audio_name'] ; ?></td>
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

	if(move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],"myfile/".$_FILES["uploadedfile"]["name"])){
		echo "Copy/Upload Complete<br>";
		$sql = "INSERT INTO story ";
		$objQuery = mysql_query($sql);		
	}
	echo $_FILES["uploadedfile"]["name"];
		$upload =	"http://dump.geozigzag.com/api/myfile/".$_FILES["uploadedfile"]["name"];
		$sql = "UPDATE story SET image_name ='$upload' WHERE id ORDER BY id DESC";
	
	if (mysql_query($sql) === TRUE) {
    	echo "Record updated successfully";
		echo $_FILES["uploadedfile"]["name"];
	} else {
    	echo "Error updating record: " .mysql_error();
	}
?>