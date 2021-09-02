<div class="col-lg-9">

    <ul class="nearby-contct">
        <?php

        function _formatDate($time)
        {
            if ($time >= strtotime("today 00:00") && $time < strtotime("today 12:00")) {
                return date("h:i", $time) . " قبل از ظهر";
            } elseif ($time >= strtotime("today 12:00") && $time < strtotime("tomorrow 00:00")) {
                return date("h:i", $time) . " بعد از ظهر";
            } elseif ($time >= strtotime("yesterday 00:00")) {
                return "Yesterday at " . date("g:i A", $time);
            } elseif ($time >= strtotime("-6 day 00:00")) {
                return date("l \\a\\t g:i A", $time);
            } else {
                return date("M j, Y", $time);
            }
        }


        $result = $conn->query("SELECT * FROM user ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($result)) {
            $feed = $conn->query("SELECT * FROM friend where user_1='" . $_GET['p'] . "' and user_2='" . $row['username'] . "' and acc='1'");
            if (mysqli_num_rows($feed) != 0) {
                $feedrow = mysqli_fetch_assoc($feed);
                ?>
                <li>
                    <div class="nearly-pepls">

                        <div class="pepl-info">
                            <div class="col-9 ">
                                <figure>
                                    <a href="profile.php?p=<?php echo $row['username']; ?>" title=""><img
                                                src="images/resources/<?php if (empty($row['avatar'])) {
                                                    echo 'avatar-default.png';
                                                } else {
                                                    echo $row['avatar'];
                                                } ?>" style="width:60px;height:60px" alt=""></a>
                                </figure>
                                <h4><a href="profile.php?p=<?php echo $row['username']; ?>"
                                       title=""><?php echo $row['name']; ?></a></h4>
                                <p>
                                    <span>بیماری:</span><span> <?php echo empty(trim($row['sickness'])) ? 'تعیین نشده' : $row['sickness']; ?></span>
                                </p>
                                <p>
                                    <span>تاریخ درخواست:</span><span> <?php echo _formatDate(strtotime($feedrow['requested_at'])); ?></span>
                                </p>
                            </div>
                            <div class="col-3">
                                <script>
                                    function followrs(follow, follow_id) {
                                        $.ajax({
                                            type: 'post',
                                            url: 'ajax/follow.php',
                                            data: {
                                                follow: follow
                                            },
                                            success: function (response) {
                                                document.getElementById('follow_get_result' + follow_id).innerHTML = response;
                                            }
                                        });
                                    }
                                </script>
                                <button type="button" style="float: right" class="btn btn-primary"
                                        id="follow_get_result<?php echo $row['id']; ?>" data-ripple=""
                                        onclick="followrs('<?php echo $row['username']; ?>','<?php echo $row['id']; ?>')">
                                    <?php if (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $row['username'] . "'")) == 0) {
                                        echo $lang['follow'];
                                    } elseif (mysqli_num_rows($conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='" . $row['username'] . "' and acc='1'")) != 0) {
                                        echo $lang['unfollow'];
                                    } else {
                                        echo $lang['request'];
                                    } ?></button>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            }
        } ?>
    </ul>
</div><!-- photos -->
</div><!-- centerl meta -->