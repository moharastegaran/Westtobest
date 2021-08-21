<?php
session_start();
include "../../config/config.php";
global $conn;
$result=$conn->query("SELECT * from pm_chat where user_1='".$_POST['user']."' and user_2='".$_SESSION['username']."' 
    or user_1='".$_SESSION['username']."' and user_2='".$_POST['user']."'");
        while ($row=mysqli_fetch_assoc($result)){
            ?>
            <li class="
<?php
            if($row['user_1']==$_SESSION['username'] ){
                echo "me";
            }else{
                echo "you";
            }
            ?>
 message">
                <p><?php echo $row['pm'];?></p>
            </li>
        <?php }?>