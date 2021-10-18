<?php
include "../../config/config.php";
if(isset($_POST['submit'])){
    $stmt=$conn->prepare("SELECT * FROM service (name,icon,about) values (?,?,?)");
    $stmt->execute(array($_POST['name'],$_POST['icon'],$_POST['about']));
}elseif (isset($_POST['update'])){
    $stmt=$conn->prepare("SELECT * FROM service where id=?");
    $stmt->execute(array($_POST['update']));
    while ($row=$stmt->fetch()){
        ?>
        <?php
    }
}elseif(isset($_POST['sub-update'])) {
    $stmt=$conn->prepare("UPDATE service SET name=? , icon=?, about=? where id=?");
    $stmt->execute(array($_POST['name'],$_POST['icon'],$_POST['about'],$_POST['sub-update']));
}elseif(isset($_POST['sub-delete'])){
    $stmt=$conn->prepare("DELETE from service where id=?");
    $stmt->execute(array($_POST['sub-delete']));
}else{
    $stmt=$conn->prepare("SELECT * FROM service");
    $stmt->execute();
    while ($row=$stmt->fetch()){
        ?>
        <?php
    }
}
