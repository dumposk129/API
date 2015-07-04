<?php
//Use Production
/*$objConnect = mysql_connect("localhost","bancduri_dump","dump12345") or die("Error Connect to Database");
$objDB = mysql_select_db("bancduri_class1");
*/
//Use Local
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("stories");

mysql_query("SET NAMES UTF8");
?>