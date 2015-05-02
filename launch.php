<?php

if (isset($_POST['users']) ) {
	require('connect.php');
	$username = $_POST['users'];
	$query = "SELECT * FROM `time_calculation` WHERE id='$username'";

	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
	//echo $count;
	while ($row = mysql_fetch_array($result)) {
		$diff=round(abs(strtotime($row['launch_start'])-strtotime($row['launch_end'])));
		if ($diff>=3600){
			$hour=$diff/3600;
			echo "<h4>".$row['date']." Lunch Duration ".$hour." Hour </h4>";
		}
		else {
			$min=$diff/60;
			echo "<h4>".$row['date']." Lunch Duration ".round($min)." Minute </h4>";
		}
		echo "";
	}

}
else {
require('user_lunch.php');
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" type="text/css" href="./css/dropdown.css">
    <script type="text/javascript" src="js/dropdown.js"></script>
<title>Launch Time </title>

</head>
<body>
<div style="text-align: center; width: 500px; margin: 0 auto;">
	<h1>Launch Time Search </h1>
    <span style="font-family: tahoma, sans-serif, arial; margin-left: 150px; font-size: 13px;">Select Name</span><br/><br/>
	<!--
	<input type="text" placeholder="Type to search.." onkeyup="search(this.value)" id="text" >
	<div id="search">
	 <?//php echo $_GET['s']; ?>
	</div>
    </input>
     -->

	<form  method="post" action="">
		<select name="users">
			<?php user_name(); ?>
		</select>
		<p id="submit">
			<button id="submit" type="submit">Submit</button>
		</p>
	</form>
	<br>

</div>
<?php } ?>
</body>
</html>