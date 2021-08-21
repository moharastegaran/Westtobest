<?php
session_start();
include "../config/config.php";
include "../lang/en.php";
global $lang;
global $conn;
if(isset($_POST['follow'])){

    if(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_POST['follow']."'and user_2='".$_SESSION['username']."'and acc='0'"))!=0){
        $conn->query("INSERT INTO friend (user_1,user_2,acc) values ('".$_SESSION['username']."','".$_POST['follow']."','1')");
        $conn->query("UPDATE friend SET acc='1' where user_1='".$_POST['follow']."' and user_2='".$_SESSION['username']."'");
    }elseif(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."'and user_2='".$_POST['follow']."'"))==0){
        $conn->query("INSERT INTO friend (user_1,user_2) values ('".$_SESSION['username']."','".$_POST['follow']."')");
        $conn->query("INSERT INTO notfic (user,for_user,notfic) values ('".$_SESSION['username']."','".$_POST['follow']."','1')");
    }elseif(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."'and user_2='".$_POST['follow']."' and acc='1'"))>0){
        $conn->query("DELETE FROM friend where user_1='".$_SESSION['username']."' or user_1='".$_POST['follow']."' and user_2='".$_POST['follow']."' or user_2='".$_SESSION['username']."'");

    }

    if(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."'and user_2='".$_POST['follow']."'"))==0) { echo $lang['follow']; }elseif(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."'and user_2='".$_POST['follow']."' and acc='1'"))!=0){echo $lang['unfollow']; }else{ echo  $lang['request']; }
}
