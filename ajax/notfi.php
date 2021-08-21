<?php
include "../config/config.php";
session_start();
global $conn;
$conn->query("UPDATE notfic SET acc='0' where for_user='".$_SESSION['username']."' and acc='1'");