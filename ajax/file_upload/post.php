<?php
session_start();
include "../../config/config.php";
include "optimize_image.php";
global $conn;

if (!empty($_POST['description'])) {
    $image=null;
    if (!empty($_POST['cover'])){
        $image = optimize_image($_POST['cover'],IMAGE_POST_DIR,800);
    }
    $conn->query('INSERT INTO post (user,cover,description,created_at) values ("' . $_SESSION['username'] . '","' . $image . '","' . $_POST['description'] . '","' . date("Y-m-d H:i:s") . '")');
}

?>