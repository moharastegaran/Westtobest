<?php
session_start();
include "../config/config.php";
global $conn;

if(isset($_POST['reject'])){

    if(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_POST['reject']."'and user_2='".$_SESSION['username']."'and acc='0'"))!=0){
        $conn->query("DELETE FROM friend WHERE user_1='".$_POST['reject']."' and user_2='".$_SESSION['username']."' and acc='0'");
        $conn->query("DELETE FROM notif WHERE user='".$_POST['reject']."' and for_user='".$_SESSION['username']."' and acc='0' and notif='1'");
    }
}
