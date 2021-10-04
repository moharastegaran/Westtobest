<?php
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PWD = '78188124';
const DB_NAME = 'human';

const UPLOAD_DIR = 'file/';
const AVATAR_DIR = UPLOAD_DIR."profile_file/avatar/";
const COVERS_DIR =  UPLOAD_DIR."profile_file/cover/";
const POSTS_DIR =  UPLOAD_DIR."profile_file/avatar/";

$conn=new mysqli(DB_HOST,DB_USERNAME,DB_PWD,DB_NAME);
if($conn->connect_error){
    die("connection error:".$conn->connect_error);
}
mysqli_set_charset($conn,"utf8mb4");
function data_now(){
    $now = DateTime::createFromFormat('U.u', microtime(true));
   
    return  $now->format("m_d_Y_H_i_s_u");
}

?>
