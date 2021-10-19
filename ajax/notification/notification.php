<?php
session_start();

include "../../config/config.php";

global $conn;

$sql = "SELECT * FROM notfic where for_user='" . $_SESSION['username'] . "' and acc='1'";
if (isset($_POST['notfic']) && $_POST['notfic'] === '4') {
    $sql .= " and notfic='4'";
}else{
    $sql.= " and notfic!='4'";
}
$result = $conn->query($sql);
$notint = mysqli_num_rows($result);
if ($notint != 0) {
    echo $notint;
}
