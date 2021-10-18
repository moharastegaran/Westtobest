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
              <h4>تنظیمات شخصی</h4>
          </div>
          <div class="card-body">
<form enctype="multipart/form-data" id="form" autocomplete="off">
    <?php
    $user=$conn->prepare("SELECT * FROM user where username=?");
    $user->execute(array($_SESSION['username']));
    $users=$user->fetch();
    ?>
    <div class="form-group  form-check-inline">
        <label for="name">نام:</label>
        <input name="name" type="text" id="name" value="<?php echo $users['name'];?>" class="form-control">
        <label for="username">نام کاربری:</label>
        <input name="username" type="text" id="username" value="<?php echo $users['username'];?>" class="form-control">
        <label for="password">رمز عبور:</label>
        <input name="password" type="password" id="password" class="form-control">
    </div>
    <div class="form-group">
        <input type="hidden" id="id" name="id" value="<?php echo $users['id'];?>">
        <button type="submit" class="btn btn-primary" style="width: 100%">ثبت</button>
    </div>
</form>
              <div id="nic-back-call"></div>
              <script>
                  $(document).ready(function (e) {
                      $("#form").on('submit', (function (e) {
                          e.preventDefault();
                          $.ajax({
                              url: "ajax/setting-me.php",
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