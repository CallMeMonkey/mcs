<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/19/18
 * Time: 3:07 PM
 */
require 'header/checkAuth.php';
if ($_SESSION['permissionType'] != 1 && $_SESSION['permissionType'] != 2)
    header("Location: welcome.php");
?>

<!DOCTYPE html>
<html>
<?php require 'header/htmlHead.php' ?>
<body>
<?php require 'component/head.php' ?>
<?php require 'component/sidebar.php' ?>
<?php require 'component/searchContent.php' ?>
</body>
</html>