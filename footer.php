<footer>
    <div class="container">
        <div class="row col-10 mx-auto">
            <div class="col-lg-4 col-md-4">
                <div class="widget">
                    <div class="foot-logo">
                        <div class="logo">
                            <a href="index.php" title=""><img src="images/logo.png" alt=""></a>
                        </div>
                        <p>
                            Delldate is a social media website dedicated to people all around the globe.
                        </p>
                    </div>
                    <ul class="location">
                        <li>
                            <i class="ti-map-alt"></i>
                            <p>Germany - Berlin</p>
                        </li>
                        <li>
                            <i class="ti-mobile"></i>
                            <p>+49 200 100300555</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="widget">
                    <div class="widget-title"><h4>useful links</h4></div>
                    <ul class="list-style">
                        <li><a href="post.php" title="posts">home</a></li>
                        <li><a href="people.php" title="explore">people</a></li>
                        <li><a href="faq.php" title="faq">Faq</a></li>
                        <li><a href="contact-us.php" title="contact us">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-4">
                <div class="widget">
                    <div class="widget-title"><h4>Our location</h4></div>
                    <img src="images/world.svg" class="img-fluid">
                </div>
            </div>
        </div>

    </div>
</footer><!-- footer -->
<div class="bottombar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="copyright">© human 2021. All rights reserved.</span>
            </div>
        </div>
    </div>
</div>
</div>
<div class="side-panel">
    <h4 class="panel-title"><?php echo $lang['Shortcuts'] ?></h4>
    <!--        <ul style="list-style: none">-->
    <ul class="naves">
        <li><a href="index.php" title=""><i class="ti-home"></i> <?php echo $lang['home']; ?></a></li>
        <li><a href="post.php" title=""><i class="ti-clipboard"></i> <?php echo $lang['post']; ?></a></li>
        <li><a href="profile.php?p=<?php echo $_SESSION['username']; ?>" title=""><i
                        class="ti-files"></i> <?php echo $lang['My_pages']; ?></a></li>
        <li><a href="notfiction.php" title=""><i class="ti-bell"></i> <?php echo $lang['notification']; ?></a></li>
        <li><a href="messages.php" title=""><i class="ti-comments-smiley"></i> <?php echo $lang['messages']; ?></a></li>
        <li><a href="setting.php" title=""><i class="ti-settings"></i> <?php echo $lang['setting']; ?></a></li>
        <li><a href="people.php" title=""><i class="ti-user"></i> <?php echo $lang['People']; ?></a></li>
    </ul>
</div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="js/main.min.js"></script>
<script src="js/script.js"></script>

</body>

</html>