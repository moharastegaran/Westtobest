<?php
include "../../config/config.php";

$icon=$_FILES['icon']['name'];
$tmpname_icon=$_FILES['icon']['tmp_name'];
$folder='../../images/'.$icon;
move_uploaded_file($tmpname_icon, $folder);
$logo=$_FILES['logo']['name'];
$tmpname_logo=$_FILES['logo']['tmp_name'];
$folders='../../images/'.$logo;
move_uploaded_file($tmpname_logo, $folders);
$data=array(
    'title'=>$_POST['title'],
    'description'=>$_POST['description'],
    'keyword'=>$_POST['keyword'],
    'icon'=>$icon,
    'logo'=>$logo,
    'google_site_kay'=>$_POST['google_site_kay'],
    'google_secret_kay'=>$_POST['google_secret_kay']
);
$add_data=json_encode($data);
$stmt=$conn->prepare("UPDATE site SET data='".$add_data."' where id='1'");
$stmt->execute();