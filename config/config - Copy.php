<?php
$host='localhost';
$user='miraweb1';
$password='52boJxk87U';
$db='miraweb1_human';
$conn=new mysqli($host,$user,$password,$db);
if($conn->connect_error){
    die("connection error:".$conn->connect_error);
}
mysqli_set_charset($conn,'utf8');