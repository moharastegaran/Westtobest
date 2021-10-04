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
<!--                                    <script>-->
<!--                                        const messages = document.getElementById('massages');-->
<!---->
<!--                                        function appendMessage() {-->
<!--                                            const message = document.getElementsByClassName('message')[0];-->
<!--                                            const newMessage = message.cloneNode(true);-->
<!--                                            messages.appendChild(newMessage);-->
<!--                                        }-->
<!---->
<!--                                        function getMessages() {-->
<!--                                            // Prior to getting your messages.-->
<!--                                            shouldScroll = messages.scrollTop + messages.clientHeight === messages.scrollHeight;-->
<!--                                            /*-->
<!--                                             * Get your messages, we'll just simulate it by appending a new one syncronously.-->
<!--                                             */-->
<!--                                            appendMessage();-->
<!--                                            // After getting your messages.-->
<!--                                            if (!shouldScroll) {-->
<!--                                                scrollToBottom();-->
<!--                                            }-->
<!--                                        }-->
<!---->
<!--                                        function scrollToBottom() {-->
<!--                                            messages.scrollTop = messages.scrollHeight;-->
<!--                                        }-->
<!---->
<!--                                        scrollToBottom();-->
<!---->
<!--                                        setInterval(getMessages, 100);-->
<!--                                    </script>-->
                                    <div class="messages" style="min-height: 500px;height:auto">
                                        <h5 class="f-title"><i class="ti-bell"></i><?php echo $lang['messages_title'] ?>
<!--                                            <span class="more-options"><i class="fa fa-ellipsis-h"></i></span>-->
                                        </h5>
                                        <div class="message-box">
<!--                                            start peoples-->
                                            <ul class="peoples">
                                                <?php
                                                $result=$conn->query("SELECT * FROM friend where user_1='".$_SESSION['username']."' and acc='1'");
                                                while ($row=mysqli_fetch_assoc($result)){
                                                    $user=$conn->query("SELECT * FROM user where username='".$row['user_2']."'");
                                                    while ($us=mysqli_fetch_assoc($user)){
                                                ?>
                                                <li>
                                                    <a onclick="<?php echo $us['username'];?>()">
                                                        <figure>
                                                            <img src="<?php if(empty($us['avatar'])){ echo 'images/resources/avatar-default.png'; }else { echo AVATAR_DIR.$us['avatar'];}?>" style="width: 30px;height: 30px" alt="">
                                                            <span class="status f-online"></span>
                                                        </figure>
                                                        <div class="people-name">
                                                            <span><?php echo $us['name'];?></span>
                                                        </div>
                                                    </a>
                                                </li>
                                                        <script>
                                                            function <?php echo $us['username'];?>(){
                                                                name='<?php echo $us['username'];?>';
                                                                $.ajax({
                                                                    type:'post',
                                                                    url:'ajax/massage.php',
                                                                    data:{
                                                                        user:'<?php echo $us['username'];?>'
                                                                    },
                                                                    success:function (response) {
                                                                        document.getElementById("massage").innerHTML=response;
                                                                    }
                                                                });

                                                                setInterval(function(){
                                                                        if(name=='<?php echo $us['username'];?>') {
                                                                            $.ajax({
                                                                                type: 'post',
                                                                                url: 'ajax/massage/massage_get.php',
                                                                                data: {
                                                                                    user: '<?php echo $us['username'];?>'
                                                                                },
                                                                                success: function (response) {
                                                                                    document.getElementById('massages').innerHTML = response;
                                                                                }
                                                                            });
                                                                        }
                                                                    },100)
                                                                }

                                                        </script>
                                                        <script>
                                                            function on_mass(user,massage){
                                                                $.ajax({
                                                                    type:'post',
                                                                    url:'ajax/massage/send.php',
                                                                    data:{
                                                                        user:user,
                                                                        massage:massage
                                                                    },
                                                                    success:function (response){
                                                                        document.getElementById("massage_text").value='';
                                                                    }
                                                                });
                                                            }
                                                        </script>

                                                    <?php }}?>
                                            </ul>
<!--                                            end peoples-->
<!--                                            start chat box-->
                                            <div class="peoples-mesg-box" id="massage"  style="height: 500px">

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