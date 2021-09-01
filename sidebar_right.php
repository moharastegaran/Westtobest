<div class="col-lg-3">
								<aside class="sidebar static">
								<div class="widget">
										<h4 class="widget-title"><?php echo $lang['titles']['friends'];?></h4>
										<ul class="followers">
											<?php 
								         	if(isset($_GET['p'])){
											$p=$_GET['p'];
											}else{
											$p=$_SESSION['username'];
											}
											$result=$conn->query("SELECT * FROM friend where user_1='".$p."' and acc='1' LIMIT 10");
											if($result->num_rows > 0 ){
								         	while ($row=mysqli_fetch_assoc($result)){
												$result=$conn->query("SELECT * FROM user where username='".$row['user_2']."'");
												while ($row=mysqli_fetch_assoc($result)){
											?>
											<li>
												<figure><img src="images/resources/<?php if(empty($row['avatar'])){ echo 'avatar-default.png';}else{echo $row['avatar'];}?>" alt=""></figure>
												<div class="friend-meta">
													<h4>
                                                        <a href="profile.php?p=<?php echo $row['username'];?>" title="<?php echo $row['name'];?>">
                                                            <?php echo $row['name'];?>
                                                        </a>
                                                    </h4>
												</div>
											</li>
											<?php } }
                                            }else{
											    ?>
                                                <div class="alert alert-info"><?php echo $lang['Alert_no_friends'];?> <i><ins><a href="people.php"><?php echo $lang['Alert_no_friends_link'];?></a></ins></i> </div>
                                            <?php
                                            }
                                            ?>
										</ul>
									</div><!-- who's friend -->
								</aside>
							</div