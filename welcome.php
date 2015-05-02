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
$flag=0;

if (isset($_POST['start']) && $flag==0){
    $start = $_POST['start'];
    $query = "INSERT INTO  `time_calculation` (id,date,launch_start)VALUES ('$id',CURDATE(),now())";
    //$query = "UPDATE `time_calculation` SET launch_start='$start' id='$id' WHERE 1";
    $result = mysql_query($query);
    if ($result) {
        $msg = "In launch";
        echo $msg;
    }
    $flag=1;
}
if (isset($_POST['end'])){
    $end = $_POST['end'];
     $query="UPDATE `time_calculation` SET launch_end=now() WHERE id='" .$id . "' AND date=CURDATE()";
    //$query = "INSERT INTO  `time_calculation` (id,date,launch_start)VALUES ('$id',CURDATE(),now())";
    //$query = "UPDATE `time_calculation` SET launch_start='$start' id='$id' WHERE 1";
    $result = mysql_query($query);
    if ($result) {
        $msg = "Launch end";
        echo $msg;
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

<p> <?php echo "<a href='logout.php'>Logout</a>"; ?> </p>