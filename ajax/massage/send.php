<?php
session_start();
include "../../config/config.php";
global $conn;
if(!empty($_POST['massage'])){
    $conn->query("INSERT INTO pm_chat (user_1,user_2,pm) values ('".$_SESSION['username']."','".$_POST['user']."','".$_POST['massage']."')");
}
