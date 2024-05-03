<?php
if ( isset($_GET["Album_no"]) ) {
    $ID = $_GET["Album_no"];

    $servername="localhost";
     $username="root";
    $password="";
 $database="musicplayer";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM tracks WHERE Album_no=$ID";
    $connection->query($sql);
}

header("location: /musicplayer/indexx.php");
exit;
?>