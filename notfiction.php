<?php
session_start();
if(isset($_SESSION['username'])){
    include "config/config.php";
    include "header.php";
    global $conn;

    ?>
    <section>
        <div class="gap gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row merged20" id="page-contents">
                            <!--start sidebar left -->
                            <?php include "sidebar_left.php";?>
                            <!--end sidebar left -->
                            <!--start main -->
                            <div class="col-lg-9">
                                <div class="central-meta">
                                    <div class="editing-interest">
                                        <h5 class="f-title"><i class="ti-bell"></i><?php echo $lang['all_notification'];?> </h5>
                                        <div class="notification-box">
                                            <ul>
                                                <?php
                                                $result=$conn->query("SELECT * FROM notfic where for_user='".$_SESSION['username']."' order by id DESC");
                                                if($result->num_rows > 0){
                                                while ($row=mysqli_fetch_assoc($result)){
                                                    $user=$conn->query("SELECT * FROM user where username='".$row['user']."'");
                                                    while ($us=mysqli_fetch_assoc($user)){
                                                ?>

                                                    <?php if($row['user']!=$_SESSION['username']){?>
                                                            <li>
                                                    <figure><a href="profile.php?p=<?php echo $row['user'];?>"><img src="images/resources/<?php if($us['avatar']==0){ echo "user-avatar.jpg";}else{ echo $us['avatar']; }?>" style="width: 50px;height: 50px" alt="">
                                                        </a></figure>
                                                            <?php } ?>
                                                    <div class="notifi-meta">
                                                        <p><?php
//                                                            if(isset($_POST['follow'])){
//                                                                if(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."'and user_2='".$row['user']."' and acc='1'"))==0){
//                                                                    $conn->query("INSERT INTO friend (user_1,user_2,acc) values ('".$_SESSION['username']."','".$row['user']."','1')");
//                                                                    $conn->query("UPDATE friend SET acc='1' where user_1='".$row['user']."' and user_2='".$_SESSION['username']."'");
//                                                                }else{
//                                                                    $conn->query("DELETE FROM friend where user_1='".$_SESSION['username']."' or user_2='".$_SESSION['username']."' and user_1='".$row['user']."' or user_2='".$row['user']."'");
//                                                                }
//                                                            }
                                                            switch ($row['notfic']){
                                                                case "1":
                                                                    echo $us['name'].' '.$lang['friend_request'];
                                                           ?>
                                                                    <script>
                                                                        function follows(follow,follow_id){
                                                                            $.ajax({
                                                                                type:'post',
                                                                                url:'ajax/follow.php',
                                                                                data:{
                                                                                    follow:follow
                                                                                },
                                                                                success:function (response){
                                                                                    document.getElementById('follow_get'+follow_id).innerHTML=response;
                                                                                }
                                                                            });
                                                                        }
                                                                    </script>
                                                                    <button type="button" style="float: right" class="btn btn-primary" title="" id="follow_get<?php echo $us['id'];?>" data-ripple="" onclick="follows('<?php echo $us['username'];?>','<?php echo $us['id'];?>')">
                                                                        <?php if(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."'and user_2='".$us['username']."'"))==0) { echo $lang['follow']; }elseif(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."'and user_2='".$us['username']."' and acc='1'"))!=0){echo $lang['unfollow']; }else{ echo  $lang['request']; }?></button>

                                                                    <?php
                                                                    break;
                                                                case "2":
                                                                    if($row['user']!=$_SESSION['username']){
                                                                        echo  $us['name'].' '.$lang['comment_post'].' '.'
                                                                        <a href="post.php?id='.$row['pro'].'">'.$lang['post'].'</a>
                                                                        ';
                                                                    }
                                                                    break;
                                                                case '3':
                                                                    echo  $us['name'].' '.$lang['comment_post'].' '.'
                                                                        <a href="post.php?id='.$row['pro'].'">'.$lang['like'].'</a>';
                                                                    break;
                                                            }
                                                            ?></p>
                                                    </div>
                                                </li>
                                                        <?php }}
                                                }else{
                                                    echo "<div class='alert alert-info'>".$lang['Alert_no_notification']."</div>";
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end main -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    include "footer.php";

}else{
    header("location:index.php");
}