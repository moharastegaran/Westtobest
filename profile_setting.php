 <?php
 global $conn;
                            $result=$conn->query("SELECT * FROM user where username='".$_SESSION['username']."'");
                            while($row=mysqli_fetch_assoc($result)){
                                if(isset($_POST['submit'])){
                                    $url = 'https://api.bigdatacloud.net/data/reverse-geocode-client?latitude='.trim($_POST['lat']).'&longitude='.trim($_POST['long']).'&localityLanguage=en';
                                    $json = file_get_contents($url);
                                    $data = json_decode($json);
                                    if(!empty($_POST['new-password'])){
                                        if(password_verify($_POST['old-password'],$row['password'])){
                                            $password=password_hash($_POST['new-password'],PASSWORD_DEFAULT);
                                        }else{
                                            $paserror=$lang['old_password_invaild'];
                                        }
                                    }else{
                                        $password=$row['password'];
                                    }
                                    if(!isset($paserror)){
                                        $sql=("UPDATE user SET name='".$_POST['name']."', mail='".$_POST['mail']."', birthday='".$_POST['birthday']."' , sickness='".$_POST['sickness']."' , bio='".$_POST['bio']."', password='".$password."',country='".$data->countryName."',city='".$data->city."'
                                         , lng='".$_POST['long']."' , lat='".$_POST['lat']."' WHERE username='".$_SESSION['username']."'");
                                         if($conn->query($sql)){
                                         }else{
                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                        }
      ?>

      <?php
                                    }
                                }
                            ?>
                            <div class="central-meta">
									<div class="editing-info">
										<h5 class="f-title"><i class="ti-user"></i><?php echo $lang['profile']." ".$lang['setting'];?></h5>
										<form method="post" action="">
											<div class="form-group half">	
											  <input type="text" id="name" name="name" value="<?php echo $row['name'];?>"/>
											  <label class="control-label" for="name"><?php echo $lang['first_and_last_name'];?></label><i class="mtrl-select"></i>
											</div>
											<div class="form-group half" style="display: none;">	
											  <input type="text" name="username" id="username" value="<?php echo $row['username'];?>" />
											  <label class="control-label" for="input"><?php echo $lang['username'];?></label><i class="mtrl-select"></i>
											</div>
											<div class="form-group half">	
											  <input type="text" name="mail" id="mail" value="<?php echo $row['mail'];?>"/>
											  <label class="control-label" for="mail"><a href="http://www.wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b2f7dfd3dbdef2"><?php echo $lang['email'];?></a></label><i class="mtrl-select"></i>
											</div>
<!--                                            <div class="form-group half">-->
<!--                                                <select name="country" id="country">-->
<!--                                                    <option>--><?php //echo $row['country'];?><!--</option>-->
<!--                                                    <option>--><?php //echo $lang['england'];?><!--</option>-->
<!--                                                </select>-->
<!--                                                <label class="control-label" for="name">--><?php //echo $lang['country'];?><!--</label><i class="mtrl-select"></i>-->
<!--                                            </div>-->
<!--                                            <div class="form-group half">-->
<!--                                                <input type="text" id="city" name="city" value="--><?php //echo $row['city'];?><!--"/>-->
<!--                                                <label class="control-label" for="name">--><?php //echo $lang['city'];?><!--</label><i class="mtrl-select"></i>-->
<!--                                            </div>-->
                                            <div class="form-group">
                                                <input type="hidden" id="lat" name="lat">
                                                <input type="hidden" id="long" name="long">
                                                <div id="map" style="height: 250px; background: #eee; border: 2px solid #aaa;"></div>

                                                <script type="text/javascript">

                                                    var options = {
                                                        center: [<?php if(!empty($row['lat'])&&!empty($row['lng'])){echo $row['lat'].','.$row['lng'];}else{ echo '35.69827, 51.34099';}
                                                            ?>],
                                                        zoom: <?php if(!empty($row['lat'])&&!empty($row['lng'])){echo '13';}else{ echo '3';}
                                                        ?>
                                                    }

                                                    var map = L.map('map', options);

                                                    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'osm-bright'})
                                                        .addTo(map);
                                                    var myMarker = L.marker([<?php if(!empty($row['lat'])&&!empty($row['lng'])){echo $row['lat'].','.$row['lng'];}else{ echo '35.69827, 51.34099';}
                                                        ?>], {title: "MyPoint", alt: "The Big I", draggable: true})
                                                        .addTo(map)
                                                    .on('dragend', function() {
                                                            var coord = String(myMarker.getLatLng()).split(',');
                                                            console.log(coord);
                                                            var lat = coord[0].split('(');
                                                            console.log(lat);
                                                            var lng = coord[1].split(')');
                                                            console.log(lng);
                                                            document.getElementById("lat").value=lat[1];
                                                            document.getElementById("long").value=lng[0];
                                                            $.ajax({
                                                                type:'post',
                                                                url:'ajax/gelocation.php',
                                                                data:{
                                                                    lat:lat[1],
                                                                    long:lng[0]
                                                                },
                                                                success:function (response){
                                                                    myMarker.bindPopup(response).openPopup();
                                                                }
                                                            });
                                                        });

                                                </script>


                                            </div>
											<div class="form-group">	
											  <input type="date" name="birthday" id="birthday" value="<?php echo $row['birthday'];?>"/>
											  <label class="control-label" for="birthday"><i class="ti-calendar"></i> <?php echo $lang['birthday'];?></label><i class="mtrl-select"></i>
											</div>
											
											<h5 class="f-title ext-margin"><i class="ti-info-alt"></i> <?php echo $lang['bio'];?></h5>
											<div class="page-viewers">
                                            <div class="form-group">
                                <select name="sickness">
                                <option><?php if(!empty($row['sickness'])){ echo $row['sickness'];}?></option>
                                    <option><?php echo $lang['Cancer']; ?></option>
                                    <option><?php echo $lang['AIDS']; ?></option>
                                    <option><?php echo $lang['Deaf']; ?></option>
                                    <option><?php echo $lang['physical_disability']; ?></option>
                                    <option><?php echo $lang['Trans']; ?></option>
                                    <option><?php echo $lang['short']; ?></option>
                                </select>
                                <label class="control-label" for="input"><?php echo $lang['sickness']; ?></label><i class="mtrl-select"></i>
                            </div>
												<div class="form-group" id="bio">
                                                <textarea rows="4" id="textarea" name="bio" ><?php echo $row['bio'];?></textarea>
                                                <label class="control-label" for="textarea"><?php echo $lang['info'];?></label><i class="mtrl-select"></i>
												</div>
                                                <h5 class="f-title ext-margin"><i class="fa fa-lock"></i> <?php echo $lang['password'];?></h5>
                                                <div class="form-group half">	
											  <input type="password" id="old-password" name="old-password"/>
											  <label class="control-label" for="old-password"><?php echo $lang['old-password'];?></label><i class="mtrl-select"></i>
											</div>
											<div class="form-group half">	
											  <input type="password" name="new-password" id="new-password"/>
											  <label class="control-label" for="new-password"><?php if(!isset($paserror)){echo $lang['new-password'];}else{ echo $lang['old_password_invaild']; }?></label><i class="mtrl-select"></i>
											</div>
											</div>
											<div class="submit-btns">
												<button type="submit" name="submit" class="mtr-btn"><span>Save</span></button>
											</div>
										</form>
									</div>
								</div>	
<?php }?>