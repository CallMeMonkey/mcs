<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/13/18
 * Time: 8:56 PM
 */
require 'data/version.php';
?>
<div class="sidebar floatLeft">
    <ul>
        <li onclick="window.location.href='browsePatient.php'">
            <i class="fas fa-list floatLeft"></i><h4 class="floatLeft">浏览所有病历</h4>
        </li>
        <?php
        if ($_SESSION['permissionType'] == 2 || $_SESSION['permissionType'] == 1) {
            echo "<li onclick=\"window.location.href='create.php'\">
            <i class=\"fa fa-user-plus floatLeft\"></i><h4 class=\"floatLeft\">创建新病历</h4>
        </li>";
            echo "<li onclick=\"window.location.href='search.php'\">
            <i class=\"fa fa-search floatLeft\"></i><h4 class=\"floatLeft\">归纳导出</h4>
        </li>";
        }
        if ($_SESSION['permissionType'] == 1) {
            echo "<li onclick=\"window.location.href='browseUser.php'\">
            <i class=\"fa fa-address-book floatLeft\"></i><h4 class=\"floatLeft\">浏览所有用户</h4>
        </li>";
            echo "<li onclick=\"window.location.href='invite.php'\">
            <i class=\"fa fa-users floatLeft\"></i><h4 class=\"floatLeft\">邀请新用户</h4>
        </li>";
            echo "<li>
            <i class=\"fas fa-database floatLeft\"></i><h4 class=\"floatLeft\">数据备份</h4>
        </li>";
            echo "<li>
            <i class=\"fas fa-shield-alt floatLeft\"></i><h4 class=\"floatLeft\">系统监控</h4>
        </li>";
        }
        ?>
        <li onclick="window.location.href='versionInfo.php'">
            <i class="fas fa-info-circle floatLeft"></i><h4 class="floatLeft">系统更新信息</h4>
        </li>
    </ul>
    <div class="footer"><h5><?php echo $version?></h5></div>
</div>
