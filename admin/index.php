<?php
session_start();
if(isset($_SESSION['username_admin'])){
    header("location:user.php");
}else{
    header("location:login.php");
}