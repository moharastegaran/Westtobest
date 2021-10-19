<?php
session_start();

include "../config/config.php";
include "../lang/".(isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en').".php";
$result=$conn->query("SELECT * FROM user where username  COLLATE UTF8_GENERAL_CI LIKE '%".$_POST['name']."%'
                            or name  COLLATE UTF8_GENERAL_CI LIKE '%".$_POST['name']."%'");
if($result->num_rows>0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if (empty($row['avatar'])) {
            $avatar = 'avatar-default.png';
        } else {
            $avatar = $row['avatar'];
        }
        echo
            '<a href="profile.php?p=' . $row['username'] . '"><img src="images/resources/' . $avatar . '" alt="">
            <div><p>' . $row["name"] . '</p><span>@' . $row['username'] . '</span></div></a>';
    }
}else{
    echo "<span>".$lang["no_results_found"]."</span>";
}
