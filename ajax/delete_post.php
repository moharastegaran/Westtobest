<?php
session_start();
include "../config/config.php";
$result=$conn->query("SELECT * FROM post where id='".$_POST['id']."' ");
while($row=mysqli_fetch_assoc($result)) {
    if($row['user']==$_SESSION['username']){
        $conn->query("DELETE FROM post where id='".$_POST['id']."' ");
    }
}
