<?php
session_start();
include "../config/config.php";
$num=mysqli_num_rows($conn->query("SELECT * FROM like_post where post_id='".$_POST['post_id']."' and user='".$_SESSION['username']."'"));
if($num==0){
    $conn->query("INSERT INTO like_post (user,post_id) values ('".$_SESSION['username']."','".$_POST['post_id']."')");
    if($_SESSION['username']!=$_POST['for_user']){
        $conn->query("INSERT INTO notfic (user,for_user,notfic,pro) values ('".$_SESSION['username']."','".$_POST['for_user']."','3','".$_POST['post_id']."')");
    }
    echo '<i class="ti-heart" style="color: #ff0000"></i>';
}else{
    $conn->query("DELETE FROM like_post where post_id='".$_POST['post_id']."' and user='".$_SESSION['username']."' ");
    echo '<i class="ti-heart"></i>';
}
echo '<ins>'.mysqli_num_rows($conn->query("SELECT * FROM like_post where post_id='".$_POST['post_id']."'")).'</ins>';