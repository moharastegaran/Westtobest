<?php 
$result=$conn->query("SELECT * FROM user where username='".$_GET['p']."'");
while($row=mysqli_fetch_assoc($result)){
?>
<div class="col-lg-9">
								<div class="central-meta">
									<div class="about">
										<div class="personal">
											<h5 class="f-title"><i class="ti-info-alt"></i> <?php echo $lang['info'];?></h5>
										</div>
										<div class="d-flex flex-row mt-2">
											<ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
												<li class="nav-item">
													<a href="#sickness" class="nav-link" data-toggle="tab" ><?php  echo $lang['sickness'];?></a>
												</li>
                                                <li class="nav-item">
                                                    <a href="#bio" class="nav-link active" data-toggle="tab" ><?php  echo $lang['bio'];?></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#info" class="nav-link" data-toggle="tab" ><?php  echo $lang['info'];?></a>
                                                </li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane fade" id="sickness" >
													<ul class="basics">
														<li><i class="ti-heart"></i><?php  echo $row['sickness'];?></li>
													</ul>
												</div>
                                                <div class="tab-pane fade show active" id="bio" >
                                                    <ul class="basics">
                                                        <li><i class="ti-info"></i><?php  echo $row['bio'];?><?php
                                                            if($_GET['p']==$_SESSION['username']){
                                                                ?>
                                                               <a href="setting.php#bio"><i class="ti-settings"></i></a>
                                                                    <?php
                                                            }
                                                            ?></li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" id="info" >
                                                    <ul class="basics">
                                                        <li><i class="ti-crown"></i><?php  echo $row['birthday'];?></li>
                                                        <li><i class="ti-map-alt"></i><?php  echo $row['country'];?></li>
                                                        <li><i class="ti-location-pin"></i><?php  echo $row['city'];?></li>

                                                    </ul>
                                                </div>
											</div>
										</div>
									</div>
								</div>	
							</div>
                            <?php } ?>