<?php

require "../../vendor/autoload.php";
include "../../config/config.php";

use Carbon\Carbon;

session_start();
global $conn;
if (!isset($_SESSION['lang']) || $_SESSION['lang'] == 'fa') {
    include "../../lang/fa.php";
} else if (!isset($_SESSION['lang']) || $_SESSION['lang'] == 'de') {
    include "../../lang/de.php";
} else {
    include "../../lang/en.php";
    $_SESSION['lang']='en';
}

//$notint=mysqli_num_rows($conn->query("SELECT * FROM notfic where for_user='".$_SESSION['username']."' and acc='1'"));
//if($notint!=0){
//    echo '<span>'.$notint.$lang['new_notification'].'</span>';
//
//}
?>
    <?php
    $result=$conn->query("SELECT * FROM notfic where for_user='".$_SESSION['username']."' and acc='1' LIMIT 5");
    while ($row=mysqli_fetch_assoc($result)){
        $user=$conn->query("SELECT * FROM user where username='".$row['user']."'");
        while ($us=mysqli_fetch_assoc($user)){
            if($us['username']!=$_SESSION['username']){
                ?>
                <li>
                <?php
                switch ($row['notfic']){
                    case '1':
                      ?>
                        <a href="notfiction.php" title="">
                            <img src="images/resources/<?php if($us['avatar']==0){ echo "avatar-default.png";}else{ echo $us['avatar']; }?>" alt="">
                            <div class="mesg-meta">
                                <h6><?php echo $us['name'];?></h6>
                                <span><?php echo $lang['notifications']['message']['friend_request']; ?></span>
                                <i><?php echo Carbon::make($row['created_at'])->locale(isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en')->ago(); ?></i>
                            </div>
                        </a>
                        <span class="tag green"><?php echo $lang['notifications']['type']['friend_request'] ?></span>
                        <?php
                        break;
                    case '2':
                        ?>
                        <a href="post.php?id=<?php echo $row['pro'];?>" title="">
                            <img src="images/resources/<?php if($us['avatar']==0){ echo "avatar-default.png";}else{ echo $us['avatar']; }?>" alt="">
                            <div class="mesg-meta">
                                <h6><?php echo $us['name'];?></h6>
                                <span><?php echo $lang['notifications']['message']['comment']; ?></span>
                                <i><?php echo Carbon::make($row['created_at'])->locale(isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en')->ago(); ?></i>
                            </div>
                        </a>
                        <span class="tag blue"><?php echo $lang['notifications']['type']['comment'] ?></span>
                        <?php
                        break;
                    case '3':
                        ?>
                        <a href="post.php?id=<?php echo $row['pro'];?>" title="">
                            <img src="images/resources/<?php if($us['avatar']==0){ echo "avatar-default.png";}else{ echo $us['avatar']; }?>" alt="">
                            <div class="mesg-meta">
                                <h6><?php echo $us['name'];?></h6>
                                <span><?php echo $lang['notifications']['message']['like']; ?></span>
                                <i><?php echo Carbon::make($row['created_at'])->locale(isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en')->ago(); ?></i>
                            </div>
                        </a>
                        <span class="tag red"><?php echo $lang['notifications']['type']['like'] ?></span>
                        <?php
                        break;
                }
                ?>
                </li>
            <?php } }}?>

