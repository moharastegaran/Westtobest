<?php
session_start();
include "../../config/config.php";
include "optimize_image.php";
global $conn;

if (isset($_POST['image'])) {

    $img = optimize_image($_POST['image'],AVATAR_DIR);

    $result = $conn->query("SELECT * FROM user where username='" . $_SESSION['username'] . "' ");
    $row = mysqli_fetch_assoc($result);
    if(!empty($row['avatar'])){
        unlink('../../'.AVATAR_DIR.$row['avatar']);
    }
    $conn->query("UPDATE user set avatar='" . $img . "' WHERE username='" . $_SESSION['username'] . "'");

}

?>