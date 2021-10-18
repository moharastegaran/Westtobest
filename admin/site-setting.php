<?php
session_start();
if(!isset($_SESSION['username_admin'])){
    header("location:index.php");
}else{
    include "../config/config.php";
    include "header.php";
    ?>

    <div class="card">
        <div class="card-header">
            <h4>تنظیمات سایت</h4>
        </div>
       
        <div class="card-body">
            <form enctype="multipart/form-data" id="form" autocomplete="off">
                <?php
                 $site=$conn->prepare("SELECT * FROM site where name=?");
                $site->execute(array('site_setting'));
                $sites=$site->fetch();
                $data=json_decode($sites['data'],true);
                ?>

                <div class="form-group  form-check-inline">
                    <label for="title">نام:</label>
                    <input name="title" type="text" id="title" value="<?php echo $data['title'];?>" class="form-control">
                    <label for="icon">آیکون:</label>
                    <input name="icon" type="file" id="icon" class="form-control">
                    <label for="logo">لوگو:</label>
                    <input name="logo" type="file" id="logo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">دسکریپشن:</label>
                    <input name="description" type="text" id="description" value="<?php echo $data['description'];?>" class="form-control">
                    <label for="keyword">کیورد:</label>
                    <input name="keyword" type="text" id="keyword" value="<?php echo $data['keyword'];?>" class="form-control">
                </div>
                <div class="form-group form-check-inline">
                    <label for="google-site-kay">گوگل سکرت کی ریکپچ:</label>
                    <input name="google_site_kay" type="text" id="google-site-kay" value="<?php echo $data['google_site_kay'];?>" class="form-control">
                    <label for="google-secret-kay">گوگل سایت کی ریکپچ:</label>
                    <input name="google_secret_kay" type="text" id="google-secret-kay" value="<?php echo $data['google_secret_kay'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="width: 100%">ثبت</button>
                </div>
            </form>
            <div id="nic-back-call"></div>
            <script>
                $(document).ready(function (e) {
                    $("#form").on('submit', (function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: "ajax/setting-site.php",
                            type: "POST",
                            data:  new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false,
                            success:function (response){
                                document.getElementById('nic-back-call').innerHTML=response;
                            }
                        });
                    }));
                });
            </script>
        </div>
    </div>



    <?php
    include "footer.php";
}