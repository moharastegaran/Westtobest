<?php
$current_page = $_SERVER['REQUEST_URI'];
$current_page = substr($current_page, strrpos($current_page, '/') + 1);
?>

<div class="col-lg-3 d-lg-block d-none" id="sidebar-left">
    <aside class="sidebar static">
        <div class="widget stick-widget">
            <h4 class="widget-title"><?php echo $lang['titles']['shortcuts']; ?></h4>
            <ul class="naves wide">
                <li class="<?php echo strpos($current_page, 'post.php') !== false ? 'active' : '' ?>">
                    <a href="post.php" title="">
                        <i class="ti-clipboard"></i>
                        <?php echo $lang['titles']['posts']; ?></a>
                </li>
                <li class="<?php echo strpos($current_page, 'profile.php') !== false ? 'active' : '' ?>">
                    <a href="profile.php?p=<?php echo $_SESSION['username']; ?>" title="">
                        <i class="ti-files"></i>
                        <?php echo $lang['titles']['profile']; ?></a>
                </li>
                <li class="<?php echo strpos($current_page, 'messages.php') !== false ? 'active' : '' ?>">
                    <a href="messages.php" title="">
                        <i class="ti-comments-smiley"></i>
                        <?php echo $lang['titles']['messages']; ?>
                        <span id="sidbar-notfiction_comment_get" class="badge badge-info mx-1"></span>
                    </a>
                </li>
                <li class="<?php echo strpos($current_page, 'notfiction.php') !== false ? 'active' : '' ?>">
                    <a href="notfiction.php" onclick="notf()" title="">
                        <i class="ti-bell"></i>
                        <?php echo $lang['titles']['notifications']; ?>
                        <span id="sidbar-notfiction_get" class="badge badge-info mx-1"></span>
                    </a>
                </li>
                <li class="<?php echo strpos($current_page, 'setting.php') !== false ? 'active' : '' ?>">
                    <a href="setting.php" title="">
                        <i class="ti-settings"></i>
                        <?php echo $lang['titles']['setting']; ?></a>
                </li>
                <li class="<?php echo strpos($current_page, 'people.php') !== false ? 'active' : '' ?>">
                    <a href="people.php" title="">
                        <i class="ti-search"></i><?php echo $lang['titles']['explore']; ?></a>
                </li>
                <li>
                    <a href="logout.php" title="">
                        <i class="ti-power-off"></i><?php echo $lang['titles']['logout']?></a>
                </li>
            </ul>
        </div><!-- Shortcuts -->

    </aside>
</div>