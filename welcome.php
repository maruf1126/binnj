<?php
/**
 * Created by PhpStorm.
 * User: GolamMorshed
 * Date: 2015-05-01
 * Time: 9:42 PM
 */
session_start();
require('connect.php');
$username = $_SESSION['username'];
$query = "SELECT * FROM `user` WHERE username='$username'";

$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
while ($row = mysql_fetch_array($result)) {
    $id = $row['id'];

}
$flag = 0;

if (isset($_POST['start']) && $flag == 0) {
    $start = $_POST['start'];
    $query = "SELECT * FROM  `time_calculation` WHERE id='" . $id . "' AND date=CURDATE()";
    $result = mysql_query($query) or die(mysql_error());
    $count = mysql_num_rows($result);
    if ($count >= 1) {
        $msg = "Already Started Today";
        echo '<div class="form-msg">' . $msg . '</div>';
    } else {
        $query = "INSERT INTO  `time_calculation` (id,date,launch_start)VALUES ('$id',CURDATE(),now())";
        //$query = "UPDATE `time_calculation` SET launch_start='$start' id='$id' WHERE 1";
        $result = mysql_query($query);
        if ($result) {
            $msg = "In launch";
            echo '<div class="form-msg">' . $msg . '</div>';
        }
        $flag = 1;
    }
}

if (isset($_POST['end'])) {
    $end = $_POST['end'];
    $query = "SELECT * FROM  `time_calculation` WHERE id='" . $id . "' AND date=CURDATE()";
    $result = mysql_query($query) or die(mysql_error());
    $count = mysql_num_rows($result);
    while ($row = mysql_fetch_array($result)) {
        $end_time = $row['launch_end'];
    }
    //echo $end_time;
    if ($end_time>0) {
        $msg = "Already Ended Today";
        echo '<div class="form-msg">' . $msg . '</div>';
    } else {
        $query = "UPDATE `time_calculation` SET launch_end=now() WHERE id='" . $id . "' AND date=CURDATE()";
        $result = mysql_query($query);
        if ($result) {
            $msg = "Launch ended";
            echo '<div class="form-msg">' . $msg . '</div>';
        }
    }
}
?>
<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
</head>
<body>
<div class="user-lunch">
    <h1>
        <div class="welcome">
            <?php
            $username = $_SESSION['username'];
            echo "Hello " . $username . " ";
            echo "This is Lunch Time Calculator"; ?>
        </div>
    </h1>
    <div class="form">
        <form action="" method="post">
            <p id="time-start">
                <button id="start" name="start" type="submit">Start</button>
            </p>

            <p id="time-start">
                <button id="end" name="end" type="submit">End</button>
            </p>

        </form>
    </div>

    <div class="logout">
        <p> <?php echo "<a href='logout.php'>Logout</a>"; ?> </p>
    </div>

</div>