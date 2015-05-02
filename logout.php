<?php
/**
 * Created by PhpStorm.
 * User: GolamMorshed
 * Date: 2015-05-01
 * Time: 9:08 PM
 */

//session_destroy();

session_start();
if(session_destroy()) // Destroying All Sessions
{
    header("Location: index.php"); // Redirecting To Home Page
}
?>
?>