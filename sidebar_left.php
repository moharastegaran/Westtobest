<div class="col-lg-3" id="sidebar-left">
								<aside class="sidebar static">
									<div class="widget  stick-widget">
										<h4 class="widget-title"><?php echo $lang['Shortcuts'];?></h4>
										<ul class="naves">
											<li>
												<a href="post.php" title="">
                                                    <i class="ti-clipboard"></i>
                                                    <?php echo $lang['post'];?></a>
											</li>
<!--											<li>-->
<!--												<i class="ti-rss-alt"></i>-->
<!--												<a href="post.php" title="">--><?php //echo $lang['People_post'];?><!--</a>-->
<!--											</li>-->
											<li>
                                                <a href="profile.php?p=<?php echo $_SESSION['username'];?>" title="">
                                                <i class="ti-files"></i>
												<?php echo $lang['My_pages'];?></a>
											</li>
											<li>
                                                <a href="messages.php"  title="">
                                                <i class="ti-comments-smiley"></i>
												<?php echo $lang['messages'];?></a>
                                            </li>
											<li>
                                                <a href="notfiction.php" onclick="notf()" title="">
                                                <i class="ti-bell"></i>
												<?php echo $lang['notification'];?></a>
                                                <span id="sidbar-notfiction_get" class="badge badge-light"></span>
                                            </li>
											<li>
                                                <a href="setting.php" title="">
                                                <i class="ti-settings"></i>
												<?php echo $lang['setting'];?></a>
											</li>
											<li>
                                                <a href="people.php" title="">
                                                <i class="ti-search"></i><?php echo $lang['People'];?></a>
											</li>
										</ul>
									</div><!-- Shortcuts -->

								</aside>
							</div>