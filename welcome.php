<?php
/**
 * Created by PhpStorm.
 * User: GolamMorshed
 * Date: 2015-05-01
 * Time: 9:42 PM
 */
session_start();
require('connect.php');
// If the values are posted, insert them into the database.
$username = $_SESSION['username'];
$query = "SELECT * FROM `user` WHERE username='$username'";

$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
while($row=mysql_fetch_array($result))
{ $id = $row['id'];
  echo $id;
}

if (isset($_POST['start'])){
    $start = $_POST['start'];
    $date = new DateTime(null);
    $time=$date->getTimestamp();
    $query = "INSERT INTO  `time_calculation` (id,start,end,launch_start,launch_end)VALUES ('$id',NULL,NULL '$time', NULL )";
    //$query = "UPDATE `time_calculation` SET launch_start='$start' id='$id' WHERE 1";
    $result = mysql_query($query);
    if ($result) {
        $msg = "User Created Successfully.";
    }
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
</head>
<body>
<h1>
    <?php
    $username = $_SESSION['username'];
    echo "Hai " . $username . " ";
    echo "This is the Members Area"; ?>
</h1>

<form action="" method="post">
    <p id="time-start">
        <button id="start" name="start" type="submit">Start</button>
    </p>

    <p id="time-start">
        <button id="end" name="end" type="submit">End</button>
    </p>

</form>

<p> <?php echo "<a href='index.php'>Logout</a>"; ?> </p>