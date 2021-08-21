<?php
include "../config/config.php";
$result=$conn->query("SELECT * FROM user where username LIKE '%".$_POST['name']."%' or name LIKE '%".$_POST['name']."%'");
while ($row=mysqli_fetch_assoc($result)){
if (empty($row['avatar'])) {
    $avatar= 'admin.jpg';
} else {
    $avatar= $row['avatar'];
}
    echo
        '<a href="profile.php?p='.$row['username'].'"><img src="images/resources/'.$avatar.'" alt="" style="width:30px;height:30px;border-radius:20px;margin: 5px"><span>'.
        $row['name'].'</span></a><br>';
}
