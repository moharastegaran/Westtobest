<div class="col-lg-3">
    <aside class="sidebar static">
   
        <div class="widget">
										<div class="banner medium-opacity bluesh">
											<div style="background-image: url(images/resources/baner-widgetbg.jpg)" class="bg-image"></div>
											<div class="baner-top">
												<span><img src="images/book-icon.png" alt=""></span>
												<i class="fa fa-ellipsis-h"></i>
											</div>
											<div class="banermeta">
												<p>
													create your own favourit page.
												</p>
												<span>like them all</span>
												<a href="#" title="" data-ripple="">start now!<span class="ripple"><span class="ink" style="height: 206px; width: 206px; background-color: rgb(217, 217, 217); top: -84.8px; left: -40.3px;"></span></span></a>
											</div>
										</div>											
									</div>
   
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
                $friendzresult = $conn->query("SELECT * FROM friend where user_1='" . $p . "' and acc='1' LIMIT 10");
                if ($friendzresult->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($friendzresult)) {
                        $userresult = $conn->query("SELECT * FROM user where username='" . $row['user_2'] . "'");
                        $user = mysqli_fetch_assoc($userresult);
                            ?>
                            <li>
                                <figure><img src="<?php if (empty($user['avatar'])) {
                                        echo 'images/resources/avatar-default.png';
                                    } else {
                                        echo AVATAR_DIR.$user['avatar'];
                                    } ?>" alt=""></figure>
                                <div class="friendz-meta">
                                    <a href="profile.php?p=<?php echo $user['username']; ?>"
                                       title="<?php echo $user['name']; ?>">
                                        <?php echo $user['name']; ?>
                                    </a>
                                    <i><a href="javascript:void(0)"><strong><?php echo $lang['sickness'] . ':'; ?></strong> <?php echo !empty($user['sickness']) ? $lang[$user['sickness']] : $lang['sickness_undefined']; ?>
                                        </a></i>
                                </div>
                            </li>
                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-info"><?php echo $lang['Alert_no_friends']; ?>
                        <?php if (!isset($_GET['p'])) { ?>
                            <i><ins><a href="people.php"><?php echo $lang['Alert_no_friends_link']; ?></a></ins></i>
                        <?php } ?>
                    </div>
                    <?php
                }
                ?>
            </ul>
        </div><!-- who's friend -->
    </aside>
</div