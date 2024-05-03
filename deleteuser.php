<?php
if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "musicplayer";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM userlogin WHERE id=$id";
    $connection->query($sql);
}

header("location: /musicplayer/Display.php");
include("account1.html");
exit;
?>