<?php


?>
<div class="central-meta new-pst item">
    <div class="new-postbox">
        <figure>
            <?php
            $result = $conn->query("SELECT * FROM user where username='" . $_SESSION['username'] . "'");
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <img src="<?php if (empty($row['avatar'])) {
                    echo 'images/resources/avatar-default.png';
                } else {
                    echo AVATAR_DIR.$row['avatar'];
                } ?>" alt="" style="width:50px;height:50px">
            <?php } ?>
        </figure>
        <div class="newpst-input">
            <form id="newpst-form" method="post" enctype="multipart/form-data">
                <img id="post-image-preview" style="margin-bottom: 10px;border-radius: 10px"/>
                <div class="w-100 position-relative">
                <textarea rows="2" data-emoji-input="unicode" data-emojiable="true" maxlength="1500"
                          placeholder="<?php echo $lang['write_something']; ?>"
                          name="description" id="newpst-description"></textarea>
                </div>
                <div class="attachments">
                    <ul>
                        <li>
                            <i class="fa fa-image"></i>
                            <label class="fileContainer">
                                <input type="file" accept="image/*" name="file">
                            </label>
                        </li>

                        <li>
                            <button name="post" type="submit"><?php echo $lang['post']; ?></button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>