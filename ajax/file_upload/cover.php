<?php
session_start();
include "../../config/config.php";
include "optimize_image.php";
global $conn;

if (isset($_POST['image'])) {

    $img = optimize_image($_POST['image'],COVERS_DIR,1366);

    $result = $conn->query("SELECT * FROM user where username='" . $_SESSION['username'] . "' ");
    $row = mysqli_fetch_assoc($result);
    if(!empty($row['header_img'])){
        unlink('../../'.COVERS_DIR.$row['header_img']);
    }
    $conn->query("UPDATE user set header_img='" . $img . "' WHERE username='" . $_SESSION['username'] . "'");

}

?>