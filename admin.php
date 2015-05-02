<?php
/**
 * Created by PhpStorm.
 * User: GolamMorshed
 * Date: 2015-05-02
 * Time: 4:23 PM
 */
require('connect.php');

if (isset($_POST['username']) and isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    if(strcmp($username,"admin")!=0){
        echo "Invalid Login Name";
        header("location: admin.php");
    }

    $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";

    $result = mysql_query($query) or die(mysql_error());
    $count = mysql_num_rows($result);
    while($row=mysql_fetch_array($result))
    { $id = $row['id']; }

    if ($count <=0) {
        echo "Invalid Login Credentials.";
        header("location: admin.php");
    }
    else {
        header("location: launch.php");
    }
}

?>
     <p> Enter admin user name and password </p>
    <form action="" method="POST">
        <p><label>User Name : </label>
            <input id="username" type="text" name="username" placeholder="username"/></p>

        <p><label>Password&nbsp;&nbsp; : </label>
            <input id="password" type="password" name="password" placeholder="password"/></p>

        <button class="btn" type="submit" name="submit" value="Login"> Login</button>
    </form>