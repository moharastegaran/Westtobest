<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("loction:login.php");
} else {
    include "config/config.php";
    include "header.php";
//    include "top_area.php";

    $faqs = $lang['faq'];

    ?>


    <section>
        <div class="gap2 color-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top-banner">
                            <i><img src="images/faq.png" alt=""></i>
                            <h1><?php echo $lang['titles']['faq2']?></h1>
                        </div>
                        <nav class="breadcrumb">
                            <a class="breadcrumb-item" href="index.php"><?php echo $lang['home']?> </a>
                            <span class="breadcrumb-item active"><?php echo $lang['titles']['faq']?></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="gap gray-bg">
            <div class="container">
                <div class="row" id="page-contents">

                    <!--start sidebar left -->
                    <?php include "sidebar_left.php"; ?>
                    <!--end sidebar left -->
                    <!--start main -->
                    <div class="col-lg-9">
                        <div class="faq-area">
                            <h2><?php echo strtoupper($lang['titles']['faq']).'!'; ?></h2>
                            <div class="accordion" id="accordion">
<!--                                <div class="card">-->
<!--                                    <div class="card-header" id="headingOne">-->
<!--                                        <h5 class="mb-0">-->
<!--                                            <button class="btn btn-link" type="button" data-toggle="collapse"-->
<!--                                                    data-target="#collapseOne" aria-expanded="true"-->
<!--                                                    aria-controls="collapseOne">-->
<!--                                                What are proper dimensions for my banner ?-->
<!--                                            </button>-->
<!--                                        </h5>-->
<!--                                    </div>-->
<!---->
<!--                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"-->
<!--                                         data-parent="#accordion" style="">-->
<!--                                        <div class="card-body">-->
<!--                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy-->
<!--                                            nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.-->
<!--                                            <ol>-->
<!--                                                <li>suggestion : 1980 * 1200</li>-->
<!--                                                <li>others : 1900 * 1080</li>-->
<!--                                                <li>or any other landscape image</li>-->
<!--                                            </ol>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="card">-->
<!--                                    <div class="card-header" id="headingTwo">-->
<!--                                        <h5 class="mb-0">-->
<!--                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"-->
<!--                                                    data-target="#collapseTwo" aria-expanded="false"-->
<!--                                                    aria-controls="collapseTwo">-->
<!--                                                How to edit my page setting?-->
<!--                                            </button>-->
<!--                                        </h5>-->
<!--                                    </div>-->
<!--                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"-->
<!--                                         data-parent="#accordion" style="">-->
<!--                                        <div class="card-body">-->
<!--                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy-->
<!--                                            nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut-->
<!--                                            wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit-->
<!--                                            lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure-->
<!--                                            dolor in hendrerit in vulputate velit esse molestie consequat, vel illum-->
<!--                                            dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio-->
<!--                                            dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te-->
<!--                                            feugait nulla facilisi.-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="card">-->
<!--                                    <div class="card-header" id="headingThree">-->
<!--                                        <h5 class="mb-0">-->
<!--                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"-->
<!--                                                    data-target="#collapseThree" aria-expanded="false"-->
<!--                                                    aria-controls="collapseThree">-->
<!--                                                How to change password ?-->
<!--                                            </button>-->
<!--                                        </h5>-->
<!--                                    </div>-->
<!--                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"-->
<!--                                         data-parent="#accordion" style="">-->
<!--                                        <div class="card-body">-->
<!--                                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper-->
<!--                                            suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel-->
<!--                                            eum iriure dolor in hendrerit in vulputate velit esse molestie consequat,-->
<!--                                            vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et-->
<!--                                            iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis-->
<!--                                            dolore te feugait nulla facilisi.-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="card">-->
<!--                                    <div class="card-header" id="headingfour">-->
<!--                                        <h5 class="mb-0">-->
<!--                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"-->
<!--                                                    data-target="#collapsefour" aria-expanded="false"-->
<!--                                                    aria-controls="collapsefour">-->
<!--                                                How to search people nearby with location ?-->
<!--                                            </button>-->
<!--                                        </h5>-->
<!--                                    </div>-->
<!--                                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour"-->
<!--                                         data-parent="#accordion">-->
<!--                                        <div class="card-body">-->
<!--                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, oreet dolore magna-->
<!--                                            aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci-->
<!--                                            tation ullamcorper suscipit esse molestie usto odio dignissim qui blandit-->
<!--                                            praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="card">-->
<!--                                    <div class="card-header" id="headingfive">-->
<!--                                        <h5 class="mb-0">-->
<!--                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"-->
<!--                                                    data-target="#collapsefive" aria-expanded="false"-->
<!--                                                    aria-controls="collapsefive">-->
<!--                                                How to Make your favourit page ?-->
<!--                                            </button>-->
<!--                                        </h5>-->
<!--                                    </div>-->
<!--                                    <div id="collapsefive" class="collapse" aria-labelledby="headingfive"-->
<!--                                         data-parent="#accordion">-->
<!--                                        <div class="card-body">-->
<!--                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy-->
<!--                                            nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut-->
<!--                                            wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit-->
<!--                                            lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure-->
<!--                                            dolor in hendrerit in vulputate velit esse molestie consequat, vel illum-->
<!--                                            dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio-->
<!--                                            dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te-->
<!--                                            feugait nulla facilisi.-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->

                                <?php for ($i = 0; $i < count($faqs); $i++) { ?>
                                    <div class="card">
                                        <div class="card-header" id="headingItem<?php echo $i+1 ?>">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                        data-target="#faqItem<?php echo $i+1 ?>" aria-expanded="<?php echo $i===0 ? 'true' : 'false'?>"
                                                        aria-controls="faqItem<?php echo $i+1 ?>">
                                                    <?php echo $faqs[$i]['q'] ?>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="faqItem<?php echo $i+1 ?>" class="collapse <?php echo $i===0 ? 'show' : ''?>" aria-labelledby="headingItem<?php echo $i+1 ?>"
                                             data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <?php echo $faqs[$i]['answer'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!--end main -->
                </div>
            </div>
        </div>
    </section>


    <?php
    include "footer.php";
}
