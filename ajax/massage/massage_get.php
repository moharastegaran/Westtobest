<?php
session_start();
include "../../config/config.php";
global $conn;
$chat_side = null;
$result = $conn->query("SELECT * from pm_chat where user_1='" . $_POST['user'] . "' and user_2='" . $_SESSION['username'] . "' 
    or user_1='" . $_SESSION['username'] . "' and user_2='" . $_POST['user'] . "'");
while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <li class="
<?php
    if ($row['user_1'] == $_SESSION['username']) {
        echo $chat_side = "me";
    } else {
        echo $chat_side = "you";
    }
    ?>
 message">
        <figure><img src="images/resources/<?php
            if ($chat_side === 'me') {
                $meres = $conn->query("SELECT * FROM user where username='" . $_SESSION['username'] . "'");
                $merow = mysqli_fetch_assoc($meres);
                if (empty($merow['avatar'])) {
                    echo 'avatar-default.png';
                } else {
                    echo $merow['avatar'];
                }
            } else if ($chat_side === 'you') {
                $youres = $conn->query("SELECT * FROM user where username='" . $_POST['user'] . "'");
                $yourow = mysqli_fetch_assoc($youres);
                if (empty($yourow['avatar'])) {
                    echo 'avatar-default.png';
                } else {
                    echo $yourow['avatar'];
                }
            } ?>" alt="" width="32" height="32" style="max-width: 32px;max-height: 32px"></figure>
        <p><?php echo $row['pm']; ?></p>
    </li>
<?php } ?>