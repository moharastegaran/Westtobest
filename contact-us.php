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
                                <h1>get in touch</h1>
                                <p>Ask us any question. We have prepared important answered questions in our FAQ page.
                                    <a href="faq.php" style="text-decoration: underline">visited now</a></p>
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
                                    <span>Send us a message</span>
                                    <i><img src="images/envelop.png" alt=""></i>
                                </div>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" id="input" required="required">
                                        <label class="control-label" for="input">Full Name</label><i
                                                class="mtrl-select"></i>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="required">
                                        <label class="control-label" for="input">Email@</label><i
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
                                        <label class="control-label" for="textarea">Message</label><i
                                                class="mtrl-select"></i>
                                    </div>
                                    <div class="submit-btns">
                                        <button class="mtr-btn signup" type="button"><i class="fa fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="cntct-adres">
                                <h3>contact info</h3>
                                <ul>
                                    <li>
                                        <i class="ti-location-pin"></i>
                                        <span>Germany - Berlin</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-mobile-phone"></i>
                                        <span>+49 200 100300555</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o"></i>
                                        <span>info@delldate.com</span>
                                    </li>
                                </ul>

                                <h1 class="bg-cntct">Delldate</h1>
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
