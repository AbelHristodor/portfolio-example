<?php 
    $username = "abel";
    $servername = "localhost";
    $password = "lel";
    $database = "test";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
       echo "Connection to the database failed: " . $conn->connect_error;
    }
?>