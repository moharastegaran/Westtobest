<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

$result = $conn->query("SELECT * FROM user where username='" . $_GET['p'] . "'");
while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-lg-9">
        <div class="central-meta">
            <div class="about">
                <div class="personal d-flex flex-wrap justify-content-between align-items-start">
                    <h5 class="f-title" style="width: auto"><i class="ti-info-alt"></i> <?php echo $lang['info']; ?></h5>
                    <?php
                    if ($_GET['p'] == $_SESSION['username']) {
                        ?>
                        <a href="setting.php#bio"><i class="ti-settings text-purple" style="font-size: 20px"></i></a>
                        <?php
                    }
                    ?>
                </div>
                <div class="d-flex flex-row mt-2">
                    <ul class="basics">
                        <li><i class="ti-heart"></i><?php echo !empty($row['sickness']) ? $row['sickness'] : $lang['sickness_undefined']; ?></li>
                        <li><i class="ti-info"></i><?php echo !empty($row['bio']) ? $row['bio'] : '-'; ?></li>
                        <li><i class="ti-crown"></i><?php echo !empty($row['birthday']) ? Carbon::parse($row['birthday'])->locale(isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fa')->format("jS F Y") : '-'; ?></li>
                        <li><i class="ti-map-alt"></i><?php echo !empty($row['country']) ? $row['country'] : $lang['sickness_undefined']; ?></li>
                        <li><i class="ti-location-pin"></i><?php echo !empty($row['city']) ? $row['city'] : $lang['sickness_undefined']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php } ?>