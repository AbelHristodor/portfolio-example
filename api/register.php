<?php 

    include('db.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $sql = "INSERT INTO user (first_name, last_name, email, password) VALUES ('".$first_name."', '".$last_name."', '".$email."', '".$password."' )";
    if($conn->query($sql)) {
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode(array("success" => true));
    } else {
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode(array("success" => false));
    }
?>