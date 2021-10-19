<?php
session_start();

require "../../vendor/autoload.php";
include "../../config/config.php";
include "../../lang/" . (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en') . ".php";

use Carbon\Carbon;

global $conn;

$result = $conn->query("SELECT * FROM notfic where for_user='" . $_SESSION['username'] . "' and acc='1' and notfic='4' LIMIT 5");
while ($row = mysqli_fetch_assoc($result)) {
    $user = $conn->query("SELECT * FROM user where username='" . $row['user'] . "'");
    while ($us = mysqli_fetch_assoc($user)) {
        if ($us['username'] != $_SESSION['username']) {
            ?>
            <li>
                <?php
                switch ($row['notfic']) {
                    case '4':
                        ?>
                        <a href="messages.php" title="">
                            <img src="images/resources/<?php if ($us['avatar'] == 0) {
                                echo "avatar-default.png";
                            } else {
                                echo $us['avatar'];
                            } ?>" alt="">
                            <div class="mesg-meta">
                                <h6><?php echo $us['name']; ?></h6>
                                <span><?php echo $row['pro']; ?></span>
                                <i><?php echo Carbon::make($row['created_at'])->locale(isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en')->ago(); ?></i>
                            </div>
                        </a>
                        <?php
                        break;
                }
                ?>
            </li>
        <?php }
    }
} ?>

