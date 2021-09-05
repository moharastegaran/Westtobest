<?php
include "../config/config.php";
$result=$conn->query("SELECT * FROM user where username LIKE '%".$_POST['name']."%' or name LIKE '%".$_POST['name']."%'");
while ($row=mysqli_fetch_assoc($result)){
if (empty($row['avatar'])) {
    $avatar= 'avatar-default.png';
} else {
    $avatar= $row['avatar'];
}
    echo
        '<a href="profile.php?p='.$row['username'].'"><img src="images/resources/'.$avatar.'" alt="">
            <div><p>'.$row["name"].'</p><span>@'.$row['username'].'</span></div></a>';
}
