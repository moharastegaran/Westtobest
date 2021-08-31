<?php
$current_page = $_SERVER['REQUEST_URI'];
$current_page = substr($current_page,strrpos($current_page,'/')+1);
?>

<div class="col-lg-3" id="sidebar-left">
								<aside class="sidebar static">
									<div class="widget stick-widget">
										<h4 class="widget-title"><?php echo $lang['titles']['shortcuts'];?></h4>
										<ul class="naves wide">
											<li class="<?php echo strpos($current_page,'post.php')!==false ? 'active' : ''?>">
												<a href="post.php" title="">
                                                    <i class="ti-clipboard"></i>
                                                    <?php echo $lang['titles']['posts'];?></a>
											</li>
<!--											<li>-->
<!--												<i class="ti-rss-alt"></i>-->
<!--												<a href="post.php" title="">--><?php //echo $lang['People_post'];?><!--</a>-->
<!--											</li>-->
                                            <li class="<?php echo strpos($current_page,'profile.php')!==false ? 'active' : ''?>">
                                            <a href="profile.php?p=<?php echo $_SESSION['username'];?>" title="">
                                                <i class="ti-files"></i>
												<?php echo $lang['titles']['profile'];?></a>
											</li>
                                            <li class="<?php echo strpos($current_page,'messages.php')!==false ? 'active' : ''?>">
                                                <a href="messages.php"  title="">
                                                <i class="ti-comments-smiley"></i>
												<?php echo $lang['titles']['messages'];?></a>
                                            </li>
                                            <li class="<?php echo strpos($current_page,'notfiction.php')!==false ? 'active' : ''?>">
                                                <a href="notfiction.php" onclick="notf()" title="">
                                                <i class="ti-bell"></i>
												<?php echo $lang['titles']['notifications'];?></a>
                                                <span id="sidbar-notfiction_get" class="badge badge-light"></span>
                                            </li>
                                            <li class="<?php echo strpos($current_page,'setting.php')!==false ? 'active' : ''?>">
                                                <a href="setting.php" title="">
                                                <i class="ti-settings"></i>
												<?php echo $lang['titles']['setting'];?></a>
											</li>
                                            <li class="<?php echo strpos($current_page,'people.php')!==false ? 'active' : ''?>">
                                            <a href="people.php" title="">
                                                <i class="ti-search"></i><?php echo $lang['titles']['explore'];?></a>
											</li>
										</ul>
									</div><!-- Shortcuts -->

								</aside>
							</div>