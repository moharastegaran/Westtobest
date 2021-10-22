<?php
global $conn;

$result=$conn->query("SELECT * FROM user where username='".$_SESSION['username']."'");
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['new-password'])) {
        if (password_verify($_POST['old-password'], $user['password'])) {
            $password = password_hash($_POST['new-password'], PASSWORD_DEFAULT);
        } else {
            $paserror = $lang['old_password_invaild'];
        }
    } else {
        $password = $user['password'];
    }
    if (!isset($paserror)) {
        $sql = "UPDATE user SET ";
        if (!empty($_POST['name'])){
            $sql.=" name='" . $_POST['name'] . "', ";
            $user['name'] = $_POST['name'];
        }
        if (!empty($_POST['mail'])){
            $sql.="mail='" . $_POST['mail'] . "', ";
            $user['mail'] = $_POST['mail'];
        }
        if (!empty($_POST['gender'])){
            $sql.="gender='" . $_POST['gender'] . "', ";
            $user['gender'] = $_POST['gender'];
        }
        if (!empty($_POST['birthday'])){
            $sql.="birthday='" . $_POST['birthday'] . "', ";
            $user['birthday'] = $_POST['birthday'];
        }
        if (!empty($_POST['sickness'])){
            $sql.="sickness='" . $_POST['sickness'] . "', ";
            $user['sickness'] = $_POST['sickness'];
        }
        if (!empty($_POST['bio'])){
            $sql.="bio='" . $_POST['bio'] . "', ";
            $user['bio'] = $_POST['bio'];
        }
        if (!empty($_POST['lat'])){
            $sql.="lat='" . $_POST['lat'] . "', ";
            $user['lat'] = $_POST['lat'];
        }
        if (!empty($_POST['lng'])){
            $sql.="lng='" . $_POST['lng'] . "', ";
            $user['lng'] = $_POST['lng'];
        }
        if (!empty($_POST['lng']) && !empty($_POST['lat'])){
            $url = 'https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=' . trim($_POST['lat']) . '&longitude=' . trim($_POST['lng']) . '&localityLanguage=en';
            $json = file_get_contents($url);
            $data = json_decode($json);
            $sql.="country='" . $data->countryName . "', city='".$data->city."', ";
        }

        $sql.="password='".$password."' WHERE username='".$_SESSION['username']."'";

        $conn->query($sql);
//        if ($conn->query($sql)) {
////            $user['name'] = $_POST['name'];
////            $user['mail'] = $_POST['mail'];
////            $user['gender'] = $_POST['gender'];
////            $user['sickness'] = $_POST['sickness'];
////            $user['bio'] = $_POST['bio'];
////            $user['lat'] = $_POST['lat'];
////            $user['lng'] = $_POST['lng'];
////            $user['country'] = $data->countryName;
////            $user['city'] = $data->city;
//        }else{
//            var_dump(mysqli_error($conn));
//        }
        ?>

        <?php
    }
}

?>
<div class="central-meta">
    <div class="editing-info">
        <h5 class="f-title"><i class="ti-user"></i><?php echo $lang['titles']['setting']; ?></h5>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group half">
                <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>"/>
                <label class="control-label" for="name"><?php echo $lang['first_and_last_name']; ?></label><i
                        class="mtrl-select"></i>
            </div>
            <!--                <div class="form-group half" style="display: none;">-->
            <!--                    <input type="text" name="username" id="username" value="-->
            <?php //echo $user['username'];?><!--" />-->
            <!--                    <label class="control-label" for="input">-->
            <?php //echo $lang['username'];?><!--</label><i class="mtrl-select"></i>-->
            <!--                </div>-->
            <div class="form-group half">
                <input type="text" name="mail" id="mail" value="<?php echo $user['mail']; ?>"/>
                <label class="control-label" for="mail"><a href="http://www.wpkixx.com/cdn-cgi/l/email-protection"
                                                           class="__cf_email__"
                                                           data-cfemail="b2f7dfd3dbdef2"><?php echo $lang['email']; ?></a></label><i
                        class="mtrl-select"></i>
            </div>
            <div class="form-radio form-group half">
                <div class="radio">
                    <label>
                        <input type="radio" name="gender" value="male"
                            <?php echo !empty($user['gender']) && $user['gender'] === 'male' ? 'checked' : '' ?>>
                        <i class="check-box"></i>
                        <?php echo $lang['male']; ?>
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="gender" value="female"
                            <?php echo !empty($user['gender']) && $user['gender'] === 'female' ? 'checked' : '' ?>>
                        <i class="check-box"></i>
                        <?php echo $lang['female']; ?>
                    </label>
                </div>
            </div>
            <div class="form-group half">
                <input type="date" name="birthday" id="birthday" value="<?php echo $user['birthday']; ?>"/>
                <label class="control-label" for="birthday"><?php echo $lang['birthday']; ?></label><i
                        class="mtrl-select"></i>
            </div>
            <!--                                            <div class="form-group half">-->
            <!--                                                <select name="country" id="country">-->
            <!--                                                    <option>-->
            <?php //echo $user['country'];?><!--</option>-->
            <!--                                                    <option>-->
            <?php //echo $lang['england'];?><!--</option>-->
            <!--                                                </select>-->
            <!--                                                <label class="control-label" for="name">-->
            <?php //echo $lang['country'];?><!--</label><i class="mtrl-select"></i>-->
            <!--                                            </div>-->
            <!--                                            <div class="form-group half">-->
            <!--                                                <input type="text" id="city" name="city" value="-->
            <?php //echo $user['city'];?><!--"/>-->
            <!--                                                <label class="control-label" for="name">-->
            <?php //echo $lang['city'];?><!--</label><i class="mtrl-select"></i>-->
            <!--                                            </div>-->
            <div class="form-group">
                <input type="hidden" id="lat" name="lat">
                <input type="hidden" id="lng" name="lng">
                <div id="map" style="height: 250px; background: #eee; border: 2px solid #aaa;"></div>

                <script type="text/javascript">

                    var options = {
                        center: [<?php if (!empty($user['lat']) && !empty($user['lng'])) {
                            echo $user['lat'] . ',' . $user['lng'];
                        } else {
                            echo '35.69827, 51.34099';
                        }
                            ?>],
                        zoom: <?php if (!empty($user['lat']) && !empty($user['lng'])) {
                            echo '7';
                        } else {
                            echo '3';
                        }
                        ?>
                    }

                    var map = L.map('map', options);

                    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'osm-bright'})
                        .addTo(map);
                    var myMarker = L.marker([<?php if (!empty($user['lat']) && !empty($user['lng'])) {
                        echo $user['lat'] . ',' . $user['lng'];
                    } else {
                        echo '35.69827, 51.34099';
                    }
                        ?>], {title: "MyPoint", alt: "The Big I", draggable: true})
                        .addTo(map)
                        .on('dragend', function () {
                            var coord = String(myMarker.getLatLng()).split(',');
                            console.log(coord);
                            var lat = coord[0].split('(');
                            console.log(lat);
                            var lng = coord[1].split(')');
                            console.log(lng);
                            document.getElementById("lat").value = lat[1];
                            document.getElementById("lng").value = lng[0];
                            $.ajax({
                                type: 'post',
                                url: 'ajax/gelocation.php',
                                data: {
                                    lat: lat[1],
                                    lng: lng[0]
                                },
                                success: function (response) {
                                    myMarker.bindPopup(response).openPopup();
                                }
                            });
                        });

                </script>


            </div>

            <h5 class="f-title ext-margin"><i class="ti-info-alt"></i> <?php echo $lang['titles']['bio']; ?></h5>
            <div class="page-viewers">
                <div class="form-group">
                    <select name="sickness">
<!--                        <option value="sickness">--><?php //if (!empty($user['sickness'])) {
//                                echo $lang[$user['sickness']];
//                            } ?><!--</option>-->
                        <option value="Cancer" <?php echo $user['sickness']==='Cancer' ? 'selected' : ''?>><?php echo $lang['Cancer']; ?></option>
                        <option value="AIDS" <?php echo $user['sickness']==='AIDS' ? 'selected' : ''?>><?php echo $lang['AIDS']; ?></option>
                        <option value="Deaf" <?php echo $user['sickness']==='AIDS' ? 'selected' : ''?>><?php echo $lang['Deaf']; ?></option>
                        <option value="physical_disability" <?php echo $user['sickness']==='physical_disability' ? 'selected' : ''?>><?php echo $lang['physical_disability']; ?></option>
                        <option value="Trans" <?php echo $user['sickness']==='Trans' ? 'selected' : ''?>><?php echo $lang['Trans']; ?></option>
                        <option value="short" <?php echo $user['sickness']==='short' ? 'selected' : ''?>><?php echo $lang['short']; ?></option>
                        <option value="others" <?php echo $user['sickness']==='others' ? 'selected' : ''?>><?php echo $lang['others']; ?></option>
                    </select>
                    <label class="control-label" for="input"><?php echo $lang['sickness']; ?></label><i
                            class="mtrl-select"></i>
                </div>
                <div class="form-group" id="bio">
                    <textarea rows="4" id="textarea" name="bio"><?php echo $user['bio']; ?></textarea>
                    <label class="control-label" for="textarea"><?php echo $lang['info']; ?></label><i
                            class="mtrl-select"></i>
                </div>
                <h5 class="f-title ext-margin"><i class="fa fa-lock"></i> <?php echo $lang['password']; ?></h5>
                <div class="form-group half">
                    <input type="password" id="old-password" name="old-password"/>
                    <label class="control-label" for="old-password"><?php echo $lang['old-password']; ?></label><i
                            class="mtrl-select"></i>
                </div>
                <div class="form-group half">
                    <input type="password" name="new-password" id="new-password"/>
                    <label class="control-label" for="new-password"><?php if (!isset($paserror)) {
                            echo $lang['new-password'];
                        } else {
                            echo $lang['old_password_invaild'];
                        } ?></label><i class="mtrl-select"></i>
                </div>
            </div>
            <div class="submit-btns">
                <button type="submit" name="submit" class="mtr-btn">
                    <span><?php echo $lang['btn_save_profile_settings'] ?></span></button>
            </div>
        </form>
    </div>
</div>