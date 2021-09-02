<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("loction:login.php");
} else {
    include "config/config.php";
    include "header.php";
//    include "top_area.php";
    ?>

    <section>
        <div class="gap no-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="map-canvas" style="position: relative; overflow: hidden;">
                            <div class="map-meta">
                                <h1><?php echo $lang['contact_us']['map_meta']['title']; ?></h1>
                                <p><?php echo $lang['contact_us']['map_meta']['description']; ?>
                                    <a href="faq.php" style="text-decoration: underline"><?php echo $lang['contact_us']['map_meta']['link']; ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="gap no-top overlap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contct-info">
                            <div class="contact-form">
                                <div class="cnt-title">
                                    <span><?php echo $lang['contact_us']['form']['title']; ?></span>
                                    <i><img src="images/envelop.png" alt=""></i>
                                </div>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" id="input" required="required">
                                        <label class="control-label" for="input"><?php echo $lang['contact_us']['form']['label']['fullname']; ?></label><i
                                                class="mtrl-select"></i>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" required="required">
                                        <label class="control-label" for="input"><?php echo $lang['contact_us']['form']['label']['email']; ?></label><i
                                                class="mtrl-select"></i>
                                    </div>
                                    <!--                                <div class="form-group">-->
                                    <!--                                    <input type="text" required="required">-->
                                    <!--                                    <label class="control-label" for="input">Phone No.</label><i-->
                                    <!--                                            class="mtrl-select"></i>-->
                                    <!--                                </div>-->
                                    <!--                                <div class="form-group">-->
                                    <!--                                    <input type="text" required="required">-->
                                    <!--                                    <label class="control-label" for="input">Company</label><i class="mtrl-select"></i>-->
                                    <!--                                </div>-->
                                    <div class="form-group">
                                        <textarea rows="3" id="textarea" required="required"></textarea>
                                        <label class="control-label" for="textarea"><?php echo $lang['contact_us']['form']['label']['message']; ?></label><i
                                                class="mtrl-select"></i>
                                    </div>
                                    <div class="submit-btns">
                                        <button class="mtr-btn signup" type="button"><i class="fa fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="cntct-adres">
                                <h3><?php echo $lang['contact_us']['contact_info']['title']; ?></h3>
                                <ul>
                                    <li>
                                        <i class="ti-location-pin"></i>
                                        <span><?php echo $lang['contact_us']['contact_info']['location']; ?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-mobile-phone"></i>
                                        <span><?php echo $lang['contact_us']['contact_info']['phone']; ?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o"></i>
                                        <span><?php echo $lang['contact_us']['contact_info']['email']; ?></span>
                                    </li>
                                </ul>

                                <h1 class="bg-cntct"><?php echo $lang['contact_us']['effected_text']; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        var options = {
            center : [ '52.52', '13.40' ],
            zoom : 3
        };
        var map = L.map('map-canvas');
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'osm-bright'}).addTo(map)
    </script>

    <?php
    include "footer.php";
}
