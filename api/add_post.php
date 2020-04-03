<?php

    include('db.php');

    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $description = $_POST['description'];
    $image_name = $_FILES['image']['name'];

    $location = "../media/blog_posts/".$image_name;
    $uploadOk = 1;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);

    $valid_extensions = array("jpg", "jpeg", "png");

    if(!in_array(strtolower($imageFileType), $valid_extensions)) {
        $uploadOk = 0;
    }

    if($uploadOk == 0) {
        $success = false;
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode(array("kek" => $success));

    } else {
        $success = false;
        if(move_uploaded_file($_FILES['image']['tmp_name'], $location)) {
            $sql = "INSERT INTO image (name, url) VALUES ('".$image_name."','".$location."')";
            if($conn->query($sql)) {
                $last_id = $conn->insert_id;
                $post_sql = "INSERT INTO post (title, summary, description, author_id, category_id, image) VALUES ('".$title."', '".$summary."', '".$description."', '1', '1', '".$last_id."')";
                if($conn->query($post_sql)) {
                    $success = true;
                    header("Content-Type: application/json; charset=UTF-8");
                    echo json_encode(array("success" => $success));
                }
            } else {
                header("Content-Type: application/json; charset=UTF-8");
                echo json_encode(array("success" => $success));
            }
        } else {
            $success = $_FILES["image"]["error"];
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode(array("success" => $success));
        }
    }
?>
