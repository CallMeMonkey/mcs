<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/18/18
 * Time: 12:38 PM
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
<?php require 'component/browseUserContent.php' ?>
</body>
</html>