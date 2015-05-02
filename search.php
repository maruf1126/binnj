<?php
session_start();
require('connect.php');

if(isset($_GET['s']) && $_GET['s'] != ''){
	$s = $_GET['s'];
	$sql = "SELECT * FROM `user` WHERE username LIKE '%$s%'";
	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result)){
		$id = $row['id'];
		$username = $row['username'];
		//echo "<div style='' id='searchtitle'>" . "<a style='font-family: verdana; text-decoration: none; color: black;'>" . $username . "</a>" . "</div>";
		echo "<option value=''>".$username."</option>";
	}

}

?>