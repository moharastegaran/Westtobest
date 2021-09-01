<?php
session_start();
include "../config/config.php";
include '../lang/en.php';
global $conn;

if($_POST['sickness']!='off'||$_POST['country']!='off'||$_POST['city']!='off' ){
    $result=$conn->query("SELECT * FROM user where sickness='".$_POST['sickness']."' or country='".$_POST['country']."'
      or city='".$_POST['city']."' ORDER BY id DESC");

}else{
    $result=$conn->query("SELECT * FROM user ORDER BY id DESC");
}
?>
    <ul class="nearby-contct">
    <?php
     while ($row=mysqli_fetch_assoc($result)){
    if($row['username']!=$_SESSION['username']){
            ?>
        <li>
            <div class="nearly-pepls">
                <figure>
                    <a href="profile.php?p=<?php echo $row['username'];?>" title=""><img src="images/resources/<?php if(empty($row['avatar'])){ echo 'avatar-default.png';}else{echo $row['avatar'];}?>" style="width:60px;height:60px" alt=""></a>
                </figure>
                <div class="pepl-info">
                    <h4><a href="profile.php?p=<?php echo $row['username'];?>" title=""><?php echo $row['name'];?></a></h4>
                    <span><?php echo $row['sickness'];?></span>
<a href="#" type="button" title="" id="follow_people<?php echo $row['id'];?>" class="add-butn"  onclick="followers('<?php echo $row['username'];?>','<?php echo $row['id'];?>')">
    <?php if(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."'and user_2='".$row['username']."'"))==0) { echo $lang['follow']; }elseif(mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."'and user_2='".$row['username']."' and acc='1'"))!=0){echo $lang['unfollow']; }else{ echo  $lang['request']; }?></a>
                </div>
            </div>
        </li>
<?php } }?>
