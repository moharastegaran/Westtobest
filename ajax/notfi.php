<?php
session_start();

include "../config/config.php";

global $conn;
$sql = "UPDATE notfic SET acc='0' where for_user='".$_SESSION['username']."' and acc='1'";
if (isset($_POST['notfic']) && $_POST['notfic'] === '4') {
    $sql .= " and notfic = '4'";
}else{
    $sql.= " and notfic != '4'";
}
$conn->query($sql);