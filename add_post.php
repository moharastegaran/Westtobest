<?php

if (isset($_POST['post'])) {
    if (!empty($_POST['description']) || !empty($_FILES['file']['name'])) {
        if (!empty($_FILES['file']['name'])) {
            $img = rand('100', '10000') . $_FILES['file']['name'];
            $path = 'upload/' . $img;
            $tmp = $_FILES['file']['tmp_name'];
            move_uploaded_file($tmp, $path);
        } else {
            $img = '';
        }
        $conn->query("INSERT INTO post (user,cover,description) values ('" . $_SESSION['username'] . "','" . $img . "','" . $_POST['description'] . "')");
    }
}

?>
<div class="central-meta new-pst item">
    <div class="new-postbox">
        <figure>
            <?php
            $result = $conn->query("SELECT * FROM user where username='" . $_SESSION['username'] . "'");
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <img src="images/resources/<?php if (empty($row['avatar'])) {
                    echo 'user-avatar.jpg';
                } else {
                    echo $row['avatar'];
                } ?>" alt="" style="width:50px;height:50px">
            <?php } ?>
        </figure>
        <div class="newpst-input">
            <form method="post" action="" enctype="multipart/form-data">
                <img id="output" style="margin-bottom: 10px;border-radius: 10px"/>
                <script>
                    var loadFile = function (event) {
                        var reader = new FileReader();
                        reader.onload = function () {
                            var output = document.getElementById('output');
                            output.src = reader.result;
                        };
                        reader.readAsDataURL(event.target.files[0]);
                    };
                </script>
                <textarea rows="2" placeholder="<?php echo $lang['write_something']; ?>" name="description" id="newpst-description"></textarea>
                <div class="attachments">
                    <ul>
                        <li>
                            <i class="fa fa-video-camera"></i>
                            <label class="fileContainer">
                                <input type="file" accept="video/*" onchange="loadFile(event)">
                            </label>
                        </li>
                        <li>
                            <i class="fa fa-image"></i>
                            <label class="fileContainer">
                                <input type="file" accept="image/*" onchange="loadFile(event)" name="file">
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