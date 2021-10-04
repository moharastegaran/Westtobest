<?php
session_start();
include "../config/config.php";
$result=$conn->query("SELECT * FROM post where id='".$_POST['id']."' ");
while($row=mysqli_fetch_assoc($result)) {
    if($row['user']==$_SESSION['username']){
        if(!empty($row['cover'])){
            unlink(IMAGE_POST_DIR.$row['cover']);
        }
        $conn->query("DELETE FROM post where id='".$_POST['id']."' ");
        $conn->query("DELETE FROM like_post where post_id='".$_POST['id']."' ");
        $conn->query("DELETE FROM comment where post_id='".$_POST['id']."' ");
    }
}

