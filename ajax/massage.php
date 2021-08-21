<?php
session_start();
include "../config/config.php";
global $conn;
$users=$conn->query("SELECT * FROM user where username='".$_POST['user']."'");
while ($user=mysqli_fetch_assoc($users)){
    ?>

    <div class="conversation-head" >
        <figure><img src="images/resources/<?php if($user['avatar']==0){ echo "user-avatar.jpg";}else{ echo $user['avatar']; }?>" alt="" style="width: 50px;height: 50px"></figure>
        <span><?php echo $user['name']?></span>
    </div>
    <ul class="chatting-area" id="massages" style="height: 400px">

    </ul>
    <div class="message-text-container">
        <form method="post">
            <textarea id="massage_text"></textarea>
            <button title="send" type="button" onclick="on_mass('<?php echo $user['username'];?>',document.getElementById('massage_text').value)"><i class="fa fa-paper-plane"></i></button>
        </form>
    </div>
    </div>
    <!--                                            end chat box-->
    </div>
    </div>
    </div>
<?php
}
