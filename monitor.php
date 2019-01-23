<?php
/**
 * Created by PhpStorm.
 * User: hcall
 * Date: 01/22/2019
 * Time: 18:48
 */
require 'header/checkAuth.php';
if ($_SESSION['permissionType'] != 1)
    header("Location: welcome.php");
?>
<!DOCTYPE html>
<html>
<?php require 'header/htmlHead.php' ?>
<body>
<?php require 'component/head.php' ?>
<?php require 'component/sidebar.php' ?>
<?php require 'component/monitorContent.php' ?>
</body>
</html>