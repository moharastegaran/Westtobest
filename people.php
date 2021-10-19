<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else {
    include "config/config.php";
    include "header.php";
    ?>
    <section>
        <div class="gap gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row merged20" id="page-contents">
                            <!--start sidebar left -->
                            <?php include "sidebar_left.php"; ?>
                            <!--end sidebar left -->
                            <!--start main -->
                            <div class="col-lg-9">

                                <div class="central-meta" id="explore-people">

                                    <div class="onoff-options">
                                        <?php
                                        $user = $conn->query("SELECT * FROM user WHERE username='" . $_SESSION['username'] . "'");
                                        while ($row = mysqli_fetch_assoc($user)) {
                                            ?>
                                            <script>
                                                function change_filter() {
                                                    if (document.getElementById('country').checked) {
                                                        country = '<?php echo $row['country'];?>';
                                                    } else {
                                                        country = 'off';
                                                    }
                                                    if (document.getElementById('city').checked) {
                                                        city = '<?php echo $row['city'];?>';
                                                    } else {
                                                        city = 'off';
                                                    }
                                                    if (document.getElementById('sickness').checked) {
                                                        sickness = '<?php echo $row['sickness'];?>';
                                                    } else {
                                                        sickness = 'off';
                                                    }
                                                    $.ajax({
                                                        type: 'post',
                                                        url: 'ajax/people.php',
                                                        data: {
                                                            country: country,
                                                            city: city,
                                                            sickness: sickness
                                                        },
                                                        success: function (response) {
                                                            document.getElementById('people').innerHTML = response;
                                                            $("#btn-load-more").attr('data-loader', 1)
                                                        }
                                                    });
                                                }

                                                function load_more_filter() {
                                                    blockUI();
                                                    if (document.getElementById('country').checked) {
                                                        country = '<?php echo $row['country'];?>';
                                                    } else {
                                                        country = 'off';
                                                    }
                                                    if (document.getElementById('city').checked) {
                                                        city = '<?php echo $row['city'];?>';
                                                    } else {
                                                        city = 'off';
                                                    }
                                                    if (document.getElementById('sickness').checked) {
                                                        sickness = '<?php echo $row['sickness']; ?>';
                                                    } else {
                                                        sickness = 'off';
                                                    }
                                                    $.ajax({
                                                        type: 'post',
                                                        url: 'ajax/people.php',
                                                        data: {
                                                            country: country,
                                                            city: city,
                                                            sickness: sickness,
                                                            offset: $("#btn-load-more").attr('data-loader')
                                                        },
                                                        success: function (response) {
                                                            document.getElementById('people').innerHTML = response + document.getElementById('people').innerHTML;
                                                            $("#btn-load-more").attr('data-loader', parseInt($("#btn-load-more").attr('data-loader')) + 1)
                                                        }
                                                    });
                                                }
                                            </script>

                                            <!--                                        --><?php //if (empty($row['sickness'])){ ?>
                                            <!--                                            <div class="alert alert-danger">--><?php //echo $lang['please_selected'] . " <a href='setting.php'>" . $lang['sickness'] . '</a>'; ?><!--</div>-->
                                            <!--                                        --><?php //} ?>
                                            <!--                                        --><?php //if (empty($row['country'])){ ?>
                                            <!--                                            <div class="alert alert-danger">--><?php //echo $lang['please_selected'] . " <a href='setting.php'>" . $lang['country'] . '</a>'; ?><!--</div>-->
                                            <!--                                        --><?php //} ?>
                                            <!--                                        --><?php //if (empty($row['city'])){ ?>
                                            <!--                                            <div class="alert alert-danger">--><?php //echo $lang['please_selected'] . " <a href='setting.php'>" . $lang['city'] . '</a>'; ?><!--</div>-->
                                            <!--                                        --><?php //} ?>
                                            <div class="setting-row">
                                                <span style="width:<?php echo !empty($row['country']) ? 'auto' : '' ?>">
                                                    <?php echo $lang['country']; ?>
                                                </span>
                                                <?php if (empty($row['country'])) { ?>
                                                    <p><?php echo $lang['explore']['undefined_country']; ?></p>
                                                <?php } ?>
                                                <input type="checkbox" onclick="change_filter()" name="country" id="country"/>
                                                <label for="country"
                                                       data-on-label="<?php echo $lang['onoff_option']['label_on'] ?>"
                                                       data-off-label="<?php echo $lang['onoff_option']['label_off'] ?>"></label>
                                            </div>
                                            <div class="setting-row">
                                                <span style="width:<?php echo !empty($row['city']) ? 'auto' : '' ?>">
                                                    <?php echo $lang['city']; ?>
                                                </span>
                                                <?php if (empty($row['city'])) { ?>
                                                    <p><?php echo $lang['explore']['undefined_city']; ?></p>
                                                <?php } ?>
                                                <input type="checkbox" onclick="change_filter()" name="city" id="city"/>
                                                <label for="city"
                                                       data-on-label="<?php echo $lang['onoff_option']['label_on'] ?>"
                                                       data-off-label="<?php echo $lang['onoff_option']['label_off'] ?>"></label>
                                            </div>
                                            <div class="setting-row">
                                                <span style="width:<?php echo !empty($row['sickness']) ? 'auto' : '' ?>">
                                                    <?php echo $lang['sickness']; ?>
                                                </span>
                                                <?php if (empty($row['sickness'])) { ?>
                                                    <p><?php echo $lang['explore']['undefined_sickness']; ?></p>
                                                <?php } ?>
                                                <input type="checkbox" onclick="change_filter()" name="country" id="sickness"/>
                                                <label for="sickness"
                                                       data-on-label="<?php echo $lang['onoff_option']['label_on'] ?>"
                                                       data-off-label="<?php echo $lang['onoff_option']['label_off'] ?>"></label>
                                            </div>
                                        <?php } ?>
                                    </div>


                                    <button class="btn-view btn-load-more" id="btn-load-more" data-loader="1"
                                            onclick="load_more_filter()">Load More
                                    </button>


                                    <ul class="nearby-contct" id="people">

                                    </ul>

                                </div>
                            </div><!-- photos -->
                        </div><!-- centerl meta -->

                        <!--end main -->

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script>
        window.onload = function () {
            city = 'off';
            country = 'off';
            sickness = 'off';

            blockUI();
            change_filter()
        };

        function blockUI() {
            console.log("called");
            const _block = $('#people');
            $.blockUI({
                message: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>',
                timeout: 1000,
                overlayCSS: {
                    backgroundColor: 'rgba(78,75,75,0.56)',
                    opacity: 1,
                    cursor: 'wait'
                },
                css: {
                    // top: '15px',
                    border: 0,
                    color: '#fff',
                    padding: 0,
                    backgroundColor: 'transparent'
                }
            });
        }

        function followers(follow, follow_id) {
            $.ajax({
                type: 'post',
                url: 'ajax/follow.php',
                data: {
                    follow: follow
                },
                success: function (response) {
                    const btn = document.getElementById('follow_people' + follow_id);
                    btn.innerHTML = response;
                    btn.setAttribute('onclick','deleteRequest(\''+follow+'\',\''+follow_id+'\')');
                    if(btn.innerHTML==='<?php echo $lang['reject_request'] ?>'){
                        btn.classList.add("more-action");
                    }else if(btn.innerHTML==='<?php echo $lang['follow'] ?>'){
                        btn.classList.remove("more-action");
                    }
                }
            });
        }

        function deleteRequest(reject, reject_id){
            $.ajax({
                type : 'post',
                url : 'ajax/reject.php',
                data: {
                    reject : reject
                },
                success: function (response) {
                    const btn = document.getElementById('follow_people' + reject_id);
                    btn.innerHTML = response;
                    btn.classList.remove("more-action");
                    btn.setAttribute('onclick','followers(\''+reject+'\',\''+reject_id+'\')');
                    // btn.onclick = function (){ followers(reject, reject_id)};
                }
            });
        }
    </script>
    <?php
    include "footer.php";
}