<div class="col-lg-3">
    <div class="advertisment-box">
										<h4 class="">advertisment</h4>
										<figure>
											<a href="#" title="Advertisment"><img src="images/resources/ad-widget.gif" alt=""></a>
										</figure>
									</div>
    <aside class="sidebar static">
        <div class="widget stick-widget">
            <h4 class="widget-title"><?php echo $lang['titles']['suggestions']; ?></h4>
            <ul id="suggestions-list" class="invition followers">
                <?php
                $userresult = $conn->query("SELECT * FROM user where username='" . $_SESSION['username'] . "'");
                $user = mysqli_fetch_assoc($userresult);
                $sql = "SELECT * FROM user WHERE (";
                if (!empty(trim($user['sickness']))) {
                    $sql .= "sickness='" . $user['sickness'] . "'";
                    if (!empty(trim($user['country'])) || !empty(trim($user['city'])))
                        $sql .= " OR ";
                }
                if (!empty(trim($user['country']))) {
                    $sql .= "country='" . $user['country'] . "'";
                    if (!empty(trim($user['city'])))
                        $sql .= " OR ";
                }
                if (!empty(trim($user['city']))) {
                    $sql .= "city='" . $user['city'] . "' ";
                }
                if (empty(trim($user['sickness'])) && empty(trim($user['country'])) && empty(trim($user['city']))) {
                    $sql .= "1";
                }
                $sql .= " ) AND username!='" . $user['username'] . "' AND username NOT IN (SELECT user_2 FROM friend WHERE user_1='" . $user['username'] . "' AND acc='1')
                 AND username NOT IN (SELECT user_1 FROM friend WHERE user_2='" . $user['username'] . "' AND acc='1') limit 20";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <li>
                            <figure><img src="images/resources/<?php if (empty($row['avatar'])) {
                                    echo 'avatar-default.png';
                                } else {
                                    echo $row['avatar'];
                                } ?>" alt=""></figure>
                            <div class="friend-meta">

                                <h4><a href="profile.php?p=<?php echo $row['username']; ?>"
                                       title="<?php echo $row['name']; ?>">
                                        <?php echo $row['name']; ?>
                                    </a>
                                </h4>
                                <i>
                                    <?php
                                    echo '[' . $lang['likeness'] . ']: ';
                                    $likeness = null;
                                    if (!empty($user['sickness']) && $user['sickness'] === $row['sickness']) $likeness .= $lang['sickness'] . ',';
                                    if (!empty($user['country']) && $user['country'] === $row['country']) $likeness .= $lang['country'] . ',';
                                    if (!empty($user['city']) && $user['city'] === $row['city']) $likeness .= $lang['city'];
                                    if (strlen($likeness) > 0){
                                        if ($likeness[strlen($likeness) - 1] === ','){
                                        $likeness = substr($likeness, 0, strlen($likeness) - 1);
                                    }}else{
                                        $likeness = "none";
                                    }
                                    echo $likeness;
                                    ?>
                                </i>
                            </div>
                        </li>
                    <?php }
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