<?php
session_start();

include '../../config/config.php';
global $conn;
if (isset($_POST['notid'])){

    if (isset($_POST['typeid']) && $_POST['typeid']==='1'){
        $conn->query("DELETE FROM friend WHERE user_1='".$_POST['username']."' AND user_2='".$_SESSION['username']."' AND acc='0'");
    }

    $conn->query("DELETE FROM notfic WHERE id=".$_POST['notid']);

}