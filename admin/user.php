<?php
session_start();
if(!isset($_SESSION['username_admin'])){
    header("location:index.php");
}else{
    include "../config/config.php";
    include "header.php";
    ?>
            <div class="row ">
            <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>کاربران</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>نام</th>
                                            <th>نام کاربری</th>
                                            <th>کشوری </th>
                                            <th>شهر </th>
                                            <th>حذف کردن</th>
                                            <th>بلاک کردن</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_POST['delete'])){
                                            $stmt=$conn->prepare("DELETE FROM user where id=?");
                                            $stmt->execute(array($_POST['delete'])); 
                                        }
                                        if(isset($_POST['block'])){
                                            $stmt=$conn->prepare("UPDATE user set acc='3' where id=?");
                                            $stmt->execute(array($_POST['block'])); 
                                        }
                                        if(isset($_POST['unblock'])){
                                            $stmt=$conn->prepare("UPDATE user set acc='0' where id=?");
                                            $stmt->execute(array($_POST['unblock'])); 
                                        }
                                        $stmt=$conn->prepare("SELECT * from user");
                                        $stmt->execute();
                                        while($row=$stmt->fetch()){
?>
<tr>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['username'];?></td>
    <td><?php echo $row['country'];?></td>
    <td><?php echo $row['city'];?></td>
    <td><form action="" method="post"><input value="<?php echo $row['id'];?>" type="hidden" name="delete"/><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form></td>
    <td><?php if($row['acc']!=3){?>  <form action="" method="post"><input value="<?php echo $row['id'];?>" type="hidden" name="block"/><button type="submit" class="btn btn-primery"><i class="fa fa-ban"></i></button></form><?php }else{?>
    <form action="" method="post"><input value="<?php echo $row['id'];?>" type="hidden" name="unblock"/><button type="submit" class="btn btn-primery"><i class="fa fa-unlock-alt"></i></button></form></td><?php }?>
</tr>
<?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
    <?php
    include "footer.php";
}