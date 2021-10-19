<?php
session_start();
include "../../config/config.php";
global $conn;
if(!empty($_POST['massage'])){
    $conn->query("INSERT INTO pm_chat (user_1,user_2,pm) values ('".$_SESSION['username']."','".$_POST['user']."','".$_POST['massage']."')");
    $conn->query("INSERT INTO notfic (user,for_user,notfic,pro,created_at) values ('".$_SESSION['username']."','".$_POST['user']."','4','".$_POST['massage']."','".date("Y-m-d H:i:s")."')");
}
