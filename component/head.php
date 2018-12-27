<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/13/18
 * Time: 5:07 PM
 */
?>
<div class="head">
    <h1 class="floatLeft"><i class="fa fa-plus-square"></i>   生殖中心电子病历系统</h1>
    <h2 class="floatRight">
        <i class="fa fa-user"></i>
        <?php
        echo $_SESSION['current_user'];
        ?>
        <a href="process/logoutProcess.php" title="登出"><i class="fas fa-sign-out-alt"></i></a>
    </h2>
</div>
