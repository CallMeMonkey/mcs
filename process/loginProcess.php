<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/13/18
 * Time: 2:41 PM
 */
require '../header/connect.php';
session_start();
$login_user = $_POST['username'];
$login_pass = $_POST['password'];
$login_type = $_POST['type'];

switch ($login_type) {
    case 1:
        $name = "admin_name";
        $pass = "admin_pass";
        $table = "info_admin";
        $id = "admin_id";
        break;
    case 2:
        $name = "user_name";
        $pass = "user_pass";
        $table = "info_user";
        $id = "user_id";
        break;
    case 3:
        $name = "visitor_name";
        $pass = "visitor_pass";
        $table = "info_visitor";
        $id = "visitor_id";
        break;
}
$sql = "SELECT * FROM " . $table . " WHERE " . $name . " = '" . $login_user . "' AND " . $pass . " = '" . $login_pass . "'";
$result = $conn->query($sql);
if ($result->num_rows == 0)
    echo "<script>alert('用户名或密码或身份错误'); location.href='../index.php';</script>";
else {
    if ($login_type == 1) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['current_id'] = $row[$id];
        }
        $_SESSION['permissionType'] = $login_type;
        $_SESSION['current_user'] = $login_user;
        $_SESSION['code']=mt_rand(0, 100000);
        header("Location: ../welcome.php");
    } else {
        $t = time();
        while ($row = $result->fetch_assoc()) {
            $_SESSION['current_id'] = $row[$id];
            $startTime = $row['period_start'];
            $endTime = $row['period_end'];
        }
        if ($t >= $startTime && $t <= $endTime) {
            $_SESSION['permissionType'] = $login_type;
            $_SESSION['current_user'] = $login_user;
            $_SESSION['code']=mt_rand(0, 100000);
            header("Location: ../welcome.php");
        } else {
            echo "<script>alert('错误的时间段登录，请联系管理员'); location.href='../index.php';</script>";
        }
    }
}
/*
switch ($login_type) {
    case 1:
        $sql = "SELECT * FROM info_admin WHERE admin_name = '$login_user' and admin_pass = '$login_pass'";
        break;
    case 2:
        $sql = "SELECT * FROM info_user WHERE user_name = '$login_user' and user_pass = '$login_pass'";
        $_SESSION['permissionType'] = 2;
        break;
    case 3:
        $sql = "SELECT * FROM info_visitor WHERE visitor_name = '$login_user' and visitor_pass = '$login_pass'";
        $_SESSION['permissionType'] = 3;
        break;
}
$result = $conn->query($sql);
if ($result->num_rows == 0)
    echo "<script>alert('用户名或密码错误'); location.href='../index.php';</script>";
else {
    if ($login_type == 1) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['current_id'] = $row['admin_id'];
        }
        $_SESSION['permissionType'] = $login_type;
        $_SESSION['current_user'] = $login_user;
        $_SESSION['code']=mt_rand(0, 100000);
        header("Location: ../welcome.php");
    } else {

    }
    while ($row = $result->fetch_assoc()) {
        switch ($login_type) {
            case 1:
                $_SESSION['current_id'] = $row['admin_id'];
                $_SESSION['permissionType'] = $login_type;
                break;
            case 2:
                $_SESSION['current_id'] = $row['user_id'];
                break;
            case 3:
                $_SESSION['current_id'] = $row['visitor_id'];
                break;
        }
    }
    $_SESSION['current_user'] = $login_user;
    $_SESSION['code']=mt_rand(0, 100000);
    header("Location: ../welcome.php");
}*/