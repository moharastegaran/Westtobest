<?php 
session_start();
if(isset($_SESSION['username'])){
    header("location:post.php");
}else{
    header("location:login.php");
}