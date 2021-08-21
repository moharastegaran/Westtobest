<?php
$host='localhost';
$user='root';
$password='154656993';
$db='human';
$conn=new mysqli($host,$user,$password,$db);
if($conn->connect_error){
    die("connection error:".$conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
