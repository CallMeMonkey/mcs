<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/17/18
 * Time: 10:42 AM
 */
require 'header/checkAuth.php';
if ($_SESSION['permissionType'] == 3)
    header("Location: welcome.php");
?>
<!DOCTYPE html>
<html>
<?php require 'header/htmlHead.php' ?>
<body>
<?php require 'component/head.php' ?>
<?php require 'component/sidebar.php' ?>
<?php require 'component/editContent.php' ?>
</body>
</html>