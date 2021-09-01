<?php
include "../../config/config.php";
session_start();
global $conn;
include "../../lang/en.php";
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
                                <span><?php echo $lang['friend_request']; ?></span>
                            </div>
                        </a>
                        <?php
                        break;
                    case '2':
                        ?>
                        <a href="post.php?id=<?php echo $row['pro'];?>" title="">
                            <img src="images/resources/<?php if($us['avatar']==0){ echo "avatar-default.png";}else{ echo $us['avatar']; }?>" alt="">
                            <div class="mesg-meta">
                                <h6><?php echo $us['name'];?></h6>
                                <span><?php echo $lang['comment_post']; ?></span>
                            </div>
                        </a>
                    <?php

                        break;
                    case '3':
                        ?>
                        <a href="post.php?id=<?php echo $row['pro'];?>" title="">
                            <img src="images/resources/<?php if($us['avatar']==0){ echo "avatar-default.png";}else{ echo $us['avatar']; }?>" alt="">
                            <div class="mesg-meta">
                                <h6><?php echo $us['name'];?></h6>
                                <span><?php echo$lang['like']; ?></span>
                            </div>
                        </a>
                    <?php
                        break;
                }
                ?>

                    <span class="tag green"><?php echo $lang['New'] ?></span>
                </li>
            <?php } }}?>

