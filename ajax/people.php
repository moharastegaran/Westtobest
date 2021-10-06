<?php

require "../vendor/autoload.php";

use Carbon\Carbon;

session_start();
include "../config/config.php";
if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'fa') {
    include "../lang/fa.php";
} else if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'de') {
    include "../lang/de.php";
} else {
    include "../lang/en.php";
    $_SESSION['lang']='en';
}
global $conn;

$offset=isset($_POST['offset']) ? $_POST['offset'] : 0;

if ($_POST['sickness'] != 'off' || $_POST['country'] != 'off' || $_POST['city'] != 'off') {
    $result = $conn->query("SELECT * FROM user where sickness='" . $_POST['sickness'] . "' or country='" . $_POST['country'] . "'
      or city='" . $_POST['city'] . "' ORDER BY id DESC LIMIT 4 OFFSET ".(4*$offset));
} else {
    $result = $conn->query("SELECT * FROM user ORDER BY id DESC LIMIT 4 OFFSET ".(4*$offset));
}
?>
<!--<ul class="nearby-contct">-->
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['username'] != $_SESSION['username']) {
            ?>
            <li>
                <div class="nearly-pepls">
                    <div class="pepl-info">
                        <div class="col-lg-2 col-md-3">
                            <figure>
                                <a href="profile.php?p=<?php echo $row['username']; ?>" title=""><img
                                            src="<?php if (empty($row['avatar'])) {
                                                echo 'images/resources/avatar-default.png';
                                            } else {
                                                echo AVATAR_DIR.$row['avatar'];
                                            } ?>" style="width:60px;height:60px" alt=""></a>
                            </figure>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <h4><a href="profile.php?p=<?php echo $row['username']; ?>"
                                   title=""><?php echo $row['name']; ?></a></h4>
                            <p>
                                <span>
                                <i><strong><?php echo $lang['sickness'].':'; ?></strong></i>
                                <?php echo empty($row['sickness']) ? $lang['sickness_undefined'] : $lang[$row['sickness']]; ?>
                            </span>
                            </p>
                            <p>
                                <span>
                                <i><strong><?php echo $lang['member_from'].':'; ?></strong></i>
                                <?php echo Carbon::make($row['created_at'])->locale(isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en')->translatedFormat('D j M, H:i'); ; ?>
                            </span>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-2">
                            <a href="#" type="button" title="" id="follow_people<?php echo $row['id']; ?>"
                               class="add-butn"
                               onclick="followers('<?php echo $row['username']; ?>','<?php echo $row['id']; ?>')">
                                <?php if (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $row['username'] . "'")) == 0) {
                                    echo $lang['follow'];
                                } elseif (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $row['username'] . "' and acc='1'")) != 0) {
                                    echo $lang['unfollow'];
                                } else {
                                    echo $lang['request'];
                                } ?></a>
                        </div>
                    </div>
                </div>
            </li>
        <?php }
    } ?>