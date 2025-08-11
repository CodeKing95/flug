<?php
If( isset($_GET["id"]) ) {
    $id = $_GET["id"];

    $servername = "Localhost";
    $username = "root";
    $password = "";
    $database = "info";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM info WHERE id=$id";
    $connection->query($sql);
}

header("location: /CRUD PHP/index.php");
exit;
?>