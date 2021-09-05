<div class="col-lg-3">
    <aside class="sidebar static">
        <div class="widget stick-widget">
            <h4 class="widget-title"><?php echo $lang['titles']['friends']; ?></h4>
            <div id="searchDir"></div>
<!--            <ul class="followers">-->
                <ul id="people-list" class="friendz-list">
                <?php
                if (isset($_GET['p'])) {
                    $p = $_GET['p'];
                } else {
                    $p = $_SESSION['username'];
                }
                $result = $conn->query("SELECT * FROM friend where user_1='" . $p . "' and acc='1' LIMIT 10");
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $result = $conn->query("SELECT * FROM user where username='" . $row['user_2'] . "'");
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <li>
                                <figure><img src="images/resources/<?php if (empty($row['avatar'])) {
                                        echo 'avatar-default.png';
                                    } else {
                                        echo $row['avatar'];
                                    } ?>" alt=""></figure>
                                <div class="friendz-meta">
                                        <a href="profile.php?p=<?php echo $row['username']; ?>"
                                           title="<?php echo $row['name']; ?>">
                                            <?php echo $row['name']; ?>
                                        </a>
                                    <i><a href="javascript:void(0)"><strong><?php echo $lang['sickness'].':'; ?></strong> <?php echo !empty($row['sickness']) ? $row['sickness'] : $lang['sickness_undefined']; ?></a></i>
                                </div>
                            </li>
                        <?php }
                    }
                } else {
                    ?>
                    <div class="alert alert-info"><?php echo $lang['Alert_no_friends']; ?> <i>
                            <ins><a href="people.php"><?php echo $lang['Alert_no_friends_link']; ?></a></ins>
                        </i></div>
                    <?php
                }
                ?>
            </ul>
        </div><!-- who's friend -->
    </aside>
</div