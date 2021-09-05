<footer>
    <div class="container">
        <div class="row col-10 mx-auto">
            <div class="col-lg-4 col-md-4">
                <div class="widget">
                    <div class="foot-logo">
                        <div class="logo">
                            <a href="index.php" title=""><img src="images/logo.png" alt=""></a>
                        </div>
                        <p><?php echo $lang['Footer_description']; ?></p>
                    </div>
                    <ul class="location">
                        <li>
                            <i class="ti-map-alt"></i>
                            <p><?php echo $lang['Footer_data_location']; ?></p>
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
                    <div class="widget-title"><h4><?php echo $lang['Footer_title_links']; ?></h4></div>
                    <ul class="list-style">
                        <li><a href="index.php" title=""><?php echo $lang['home']; ?></a></li>
                        <li><a href="people.php" title=""><?php echo $lang['People']; ?></a></li>
                        <li><a href="faq.php" title=""><?php echo $lang['FAQ']; ?></a></li>
                        <li><a href="contact-us.php" title=""><?php echo $lang['Contact_Us']; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-4">
                <div class="widget">
                    <div class="widget-title"><h4><?php echo $lang['Footer_title_location']; ?></h4></div>
                    <img src="images/world.svg" class="img-fluid">
                </div>
            </div>
        </div>

    </div>
</footer><!-- footer -->
<div class="bottombar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="copyright"><?php echo $lang['footer_rights']; ?></span>
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
        <li><a href="post.php" title=""><i class="ti-clipboard"></i> <?php echo $lang['titles']['posts']; ?></a></li>
        <li><a href="profile.php?p=<?php echo $_SESSION['username']; ?>" title=""><i
                        class="ti-files"></i> <?php echo $lang['titles']['profile']; ?></a></li>
        <li><a href="notfiction.php" title=""><i class="ti-bell"></i> <?php echo $lang['titles']['notifications']; ?></a></li>
        <li><a href="messages.php" title=""><i class="ti-comments-smiley"></i> <?php echo $lang['titles']['messages']; ?></a></li>
        <li><a href="setting.php" title=""><i class="ti-settings"></i> <?php echo $lang['titles']['setting']; ?></a></li>
        <li><a href="people.php" title=""><i class="ti-user"></i> <?php echo $lang['titles']['explore']; ?></a></li>
    </ul>

    <ul class="naves-bottom">

        <div class="setting-row text-center">
            <span><?php echo $lang['onoff_option']['night_mode'] ?></span>
            <input type="checkbox" id="night_mode" name="night_mode"
                   value="nightmodeinput" <?php echo (isset($_SESSION['night_mode']) && $_SESSION['night_mode'] === "true") ? 'checked' : ''; ?>>
            <label for="night_mode" data-on-label="<?php echo $lang['onoff_option']['label_on'] ?>" data-off-label="<?php echo $lang['onoff_option']['label_off'] ?>"></label>
        </div>
    </ul>

</div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="js/main.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/block-ui/jQuery.blockui.min.js"></script>
<script src="js/emoji-picker/config.js"></script>
<script src="js/emoji-picker/util.js"></script>
<script src="js/emoji-picker/jquery.emojiarea.js"></script>
<script src="js/emoji-picker/emoji-picker.js"></script>
<script src="js/script.js"></script>
</body>

</html>