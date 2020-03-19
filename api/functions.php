<?php 
    function get_image_url($id) {
        global $conn;
        $sql = "SELECT url FROM image WHERE id='".$id."'";
        $res = $conn->query($sql);
        $url = "";
        while ($row = $res->fetch_assoc()) {
            $url = $row['url'];
        }
        return $url;
    }

?>