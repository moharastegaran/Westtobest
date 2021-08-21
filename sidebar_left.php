<div class="col-lg-3" id="sidebar-left">
								<aside class="sidebar static">
									<div class="widget  stick-widget">
										<h4 class="widget-title"><?php echo $lang['Shortcuts'];?></h4>
										<ul class="naves">
											<li>
												<i class="ti-clipboard"></i>
												<a href="post.php" title=""><?php echo $lang['post'];?></a>
											</li>
<!--											<li>-->
<!--												<i class="ti-rss-alt"></i>-->
<!--												<a href="post.php" title="">--><?php //echo $lang['People_post'];?><!--</a>-->
<!--											</li>-->
											<li>
												<i class="ti-files"></i>
												<a href="profile.php?p=<?php echo $_SESSION['username'];?>" title=""><?php echo $lang['My_pages'];?></a>
											</li>
											<li>
												<i class="ti-comments-smiley"></i>
												<a href="messages.php"  title=""><?php echo $lang['messages'];?></a>
                                            </li>
											<li>
												<i class="ti-bell"></i>
												<a href="notfiction.php" onclick="notf()" title=""><?php echo $lang['notification'];?></a>
                                                <span id="sidbar-notfiction_get" class="badge badge-light"></span>
                                            </li>
											<li>
												<i class="ti-settings"></i>
												<a href="setting.php" title=""><?php echo $lang['setting'];?></a>
											</li>
											<li>
											<i class="ti-user"></i><a href="people.php" title=""><?php echo $lang['People'];?></a>
											</li>
										</ul>
									</div><!-- Shortcuts -->

								</aside>
							</div>