<?php
session_start();

include "../config/config.php";
include "../lang/".(isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en').".php";

global $conn;
global $lang;

if(isset($_POST['reject'])) {

    if (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_POST['reject'] . "'and user_2='" . $_SESSION['username'] . "'and acc='0'")) != 0) {
        echo "in here";
        $conn->query("DELETE FROM friend WHERE user_1='" . $_POST['reject'] . "' and user_2='" . $_SESSION['username'] . "' and acc='0'");
        $conn->query("DELETE FROM notfic WHERE user='" . $_POST['reject'] . "' and for_user='" . $_SESSION['username'] . "' and notfic='1'");
    } elseif (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $_POST['reject'] . "'and acc='0'")) != 0) {
        $conn->query("DELETE FROM friend WHERE user_1='" . $_SESSION['username'] . "' and user_2='" . $_POST['reject'] . "' and acc='0'");
        $conn->query("DELETE FROM notfic WHERE user='" . $_SESSION['username'] . "' and for_user='" . $_POST['reject'] . "' and notfic='1'");
        echo $lang['follow'];
    }
}