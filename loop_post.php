<script>
    function delete_post(id){
        swal({
            title: "<?php echo $lang['delete_post']['Are_you_sure?'];?>",
            text: "<?php echo $lang['delete_post']['You_are_deleting_a_post'];?>",
            type : "warning",
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: "<?php echo $lang['delete_post']['btn_confirm']; ?>",
            cancelButtonText: "<?php echo $lang['delete_post']['btn_cancel']; ?>",
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete.value) {
                    $.ajax({
                        type:'post',
                        url:'ajax/delete_post.php',
                        data:{
                            id:id
                        },
                        success:function (response){
                            document.getElementById('post'+id).innerHTML='';
                            swal({
                                text: "<?php echo $lang['delete_post']['Deletion_was_successful'];?>",
                                type: "success",
                                confirmButtonText: "<?php echo $lang['delete_post']['btn_ok']; ?>"
                            });
                        }
                    });
                }
            });
    }

</script>
<?php
global $conn;
if(isset($_GET['p'])){
                $result=$conn->query("SELECT * FROM post where user='".$_GET['p']."' ORDER BY id DESC");

}elseif(isset($_GET['id'])){
		$result=$conn->query("SELECT * FROM post where id='".$_GET['id']."' ");
	}else{
            $result = $conn->query("SELECT * FROM post ORDER BY id DESC");

}

if(!isset($accerr)){
 while($row=mysqli_fetch_assoc($result)){
     $feed = $conn->query("SELECT * FROM friend where user_1='" . $_SESSION['username'] . "'and user_2='".$row['user']."' and acc='1'");
      if(mysqli_num_rows($feed)!=0 || $row['user']==$_SESSION['username']){
     ?>
<script>
function post<?php echo $row['id'];?>()
{
    for_user='<?php echo $row['user'];?>';
   comment = document.getElementById("comment<?php echo $row['id'];?>").value;
  user='<?php echo $_SESSION['username'];?>';
    post_id=document.getElementById('post_id<?php echo $row['id'];?>').value;
  if(comment)
  {
    $.ajax
    ({
      type: 'post',
      url: 'ajax/comment.php',
      data:
      {
         comment:comment,
		 user:user,
		 post_id:post_id,
          for_user:for_user
      },
      success: function (response)
      {
		document.getElementById("all_comments<?php echo $row['id'];?>").innerHTML=response+document.getElementById("all_comments<?php echo $row['id'];?>").innerHTML;
	    document.getElementById("comment<?php echo $row['id'];?>").value="";

      }
    });
      $.ajax({
          type: 'post',
          url: 'ajax/comment_num.php',
          data:
              {
                  post_id:document.getElementById('post_id<?php echo $row['id'];?>').value,
              },
          success: function (response)
          {
              document.getElementById("comment_num<?php echo $row['id'];?>").innerHTML=response;
          }
      });
  }
  return false;
}

</script>
          <script>
              function like<?php echo $row['id'];?>()
              {
                  $.ajax({
                      type:'post',
                      url:'ajax/like.php',
                      data:{
                          post_id:'<?php echo $row['id'];?>',
                          for_user:'<?php echo $row['user'];?>'
                      },
                      success: function (response){
                          document.getElementById("like_post<?php echo $row['id'];?>").innerHTML=response;

                      }
                  });
              }
          </script>
          <div id="post<?php echo $row['id'];?>">
	<div class="central-meta item" >
										<div class="user-post">
											<div class="friend-info">
											<figure>
											<?php
											$results=$conn->query("SELECT * FROM user where username='".$row['user']."'");
											while ($rosw=mysqli_fetch_assoc($results)){?>
												<img src="images/resources/<?php if(empty($rosw['avatar'])){ echo 'user-avatar.jpg';}else{echo $rosw['avatar'];}?>" alt="" style="width:50px;height:50px">
												</figure>
												<div class="friend-name">
													<ins><a href="profile.php?p=<?php echo $rosw['username'];?>" title=""><?php echo $rosw['name'];?></a></ins>
                                                    <span><?php echo $lang['post_created_at'].": ".date_format(date_create($row['created_at']),"Y M j, H:i") ?></span>
                                                    <?php }?>
												</div>
												<div class="post-meta">
												<?php	if($row['cover']!=0){?>
													<img width="" height="285" src="upload/<?php echo $row['cover'];?>" />
												<?php	} ?>
													<div class="we-video-info">
														<ul>

															<li style="display: none;">
																<span class="views" data-toggle="tooltip" title="views">
																	<i class="fa fa-eye"></i>
																	<ins>1.2k</ins>
																</span>
															</li>
															<li>
																<span class="comment" data-toggle="tooltip" title="Comments">
																	<i class="fa fa-comments-o"></i>
																	<ins id="comment_num<?php echo $row['id'];?>"><?php echo mysqli_num_rows($conn->query("SELECT * FROM comment where post_id='".$row['id']."'"));?></ins>
																</span>
															</li>
															<li>
                                                                <a onclick="like<?php echo $row['id'];?>()">
                                                                    <span class="like" id="like_post<?php echo $row['id'];?>" data-toggle="tooltip" title="like">
                                                                        <?php $num_user= mysqli_num_rows($conn->query("SELECT * FROM like_post where post_id='".$row['id']."' and user='".$_SESSION['username']."'")); ?>
																	<i class="ti-heart" <?php if($num_user!=0){echo 'style="color: #ff0000"';}?>></i>
																	<ins><?php echo mysqli_num_rows($conn->query("SELECT * FROM like_post where post_id='".$row['id']."'"));?></ins>
																</span>
                                                                </a>

															</li>
															<li class="social-media">
																<div class="menu">
																  <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
																 <p style="display:none" class="post_link<?php echo  $row['id'];?>" ><?php echo 'http://localhost:8081/human/post.php?d='.$row['id'];?></p>
																  <div class="rotater">
                                                            <script>
                                                                function copypostid<?php echo  $row['id'];?>() {
                                                                    const cb = navigator.clipboard;
                                                                    const paragraph = document.querySelector('.post_link<?php echo  $row['id'];?>');
                                                                    cb.writeText(paragraph.innerText).then(() => alert('post link copied'));
                                                                }                 </script>
																	<div class="btn btn-icon"><a  onclick="copypostid<?php echo  $row['id'];?>()"><i class="fa fa-clipboard"></i></a></div>
																  </div>
																</div>
															</li>
                                                            <?php if($row['user']==$_SESSION['username']){?>
                                                            <li>
                                                                <a onclick="delete_post('<?php echo $row['id'];?>')"> <span class="like" data-toggle="tooltip"><i class="ti-trash"></i></span></a>
                                                            </li>
                                                            <?php } ?>
														</ul>
													</div>
													<div class="description">

														<p>
														<?php echo $row['description'];  ?>
														</p>
													</div>
												</div>
											</div>
											<div class="coment-area">
												<ul class="we-comet" id="all_comments<?php echo $row['id'];?>">
													<?php
													$comment=$conn->query("SELECT * FROM comment where post_id='".$row['id']."' order by id DESC");
													while($comm=mysqli_fetch_assoc($comment)){
														$user=$conn->query("SELECT * FROM user where username='".$comm['user']."'");
														while ($us=mysqli_fetch_assoc($user)){
														?>

													<li>
														<div class="comet-avatar">
															<img src="images/resources/<?php if(empty($us['avatar'])){ echo 'user-avatar.jpg';}else{echo $us['avatar'];}?>" alt="">
														</div>
														<div class="we-comment">
															<div class="coment-head">
																<h5><a href="time-line.html" title=""><?php echo $us['name'];?></a></h5>
                                                                <span><?php echo $comm['date_time'];?></span>
															</div>
															<p><?php echo $comm['description'];?></p>
														</div>

													</li>
													<?php } }?>
														<div class="post-comt-box">
															<form method="post" action="" id="myform" >
															<input type="hidden" id="post_id<?php echo $row['id'];?>" value="<?php echo $row['id'];?>"/>
																<textarea placeholder="<?php echo $lang['comment'];?>" id="comment<?php echo $row['id'];?>" ></textarea>
																<button  type="button" style="top:0;color:#000" onclick="return post<?php echo $row['id'];?>();" value="sub" ><i class="fa fa-paper-plane"></i></button>
															</form>
														</div>
													</li>
												</ul>
											</div>
										</div>
										</div>
          </div>
										<?php } }}
?>
