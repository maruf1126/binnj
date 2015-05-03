<?php
/**
 * Created by PhpStorm.
 * User: GolamMorshed
 * Date: 2015-05-02
 * Time: 1:17 PM
 */

require('connect.php');
function user_name()
{
    $query = "SELECT * FROM `user` WHERE 1";

    $result = mysql_query($query) or die(mysql_error());
    echo '<option name="user-name"> Name </option>';
    while ($row = mysql_fetch_array($result)) {
        echo '<option name="user-name" value="'.$row['id'].'">'.$row['fullname'].'</option>';
    }
}