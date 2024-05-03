<?php
if ( isset($_GET["ID"]) ) {
    $ID = $_GET["ID"];

    $servername="localhost";
    $username="root";
    $password="";
    $database="musicplayer";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM artist_name WHERE ID=$ID";
    $connection->query($sql);
}

header("location: /musicplayer/index.php");
exit;
?>