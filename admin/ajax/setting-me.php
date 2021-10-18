<?php
include "../config.php";
global $conn;
$user=$conn->prepare("SELECT * FROM user where id=?");
$user->execute(array($_POST['id']));
$users=$user->fetch();
if(!empty($_POST['password'])){
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
}else{
    $password=$users['password'];
}
$stmt=$conn->prepare("UPDATE user SET username=? , name =? , password=?  where id=?");
$stmt->execute(array(
    $_POST['username'],
    $_POST['name'],
   $password,
    $_POST['id']
));