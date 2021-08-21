<?php
include "../../config/config.php";
session_start();
global $conn;
$notint = mysqli_num_rows($conn->query("SELECT * FROM notfic where for_user='" . $_SESSION['username'] . "' and acc='1'"));
if ($notint != 0) {
    echo $notint;

}
