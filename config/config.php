<?php
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PWD = '';
const DB_NAME = 'human';

const UPLOAD_DIR = 'uploads/';
const AVATAR_DIR = UPLOAD_DIR."users/avatars/";
const COVERS_DIR =  UPLOAD_DIR."users/covers/";
const IMAGE_POST_DIR=UPLOAD_DIR."posts/";

$conn=new mysqli(DB_HOST,DB_USERNAME,DB_PWD,DB_NAME);
if($conn->connect_error){
    die("connection error:".$conn->connect_error);
}
mysqli_set_charset($conn,"utf8mb4");

function data_now(){
    $now = DateTime::createFromFormat('U.u', microtime(true));
   
    return  $now->format("mdYHisu");
}
?>
