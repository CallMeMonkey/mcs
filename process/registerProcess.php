<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/17/18
 * Time: 9:25 PM
 */
require '../header/connect.php';

$register_user = $_POST['register_id'];
$register_pass = $_POST['register_password'];
$register_inv_code = $_POST['register_inv_code'];
session_start();
$checkSQL = "SELECT period_start, period_end, permission, admin_id, assignTime FROM inv_code WHERE inv_code='$register_inv_code'";
$result = $conn->query($checkSQL);
$t = time();
if ($result->num_rows == 0)
    echo "<script>alert('邀请码错误'); location.href='../index.php';</script>";
else {
    $row = mysqli_fetch_assoc($result);
    switch ($row['permission']) {
        case 1:
            $registerSQL = "INSERT INTO info_admin (admin_name, admin_pass) VALUES ('$register_user', '$register_pass')";
            mysqli_query($conn, $registerSQL);
            $_SESSION['permissionType'] = 1;
            break;
        case 2:
            $registerSQL = "INSERT INTO info_user (user_name, user_pass, period_start, period_end, assignBy, assignTime, registerTime) VALUES 
('$register_user', '$register_pass', '$row[period_start]', '$row[period_end]', '$row[admin_id]', '$row[assignTime]', '$t')";
            mysqli_query($conn, $registerSQL);
            $_SESSION['permissionType'] = 2;
            break;
        case 3:
            $registerSQL = "INSERT INTO info_visitor (visitor_name, visitor_pass, period_start, period_end, assignBy, assignTime, registerTime) VALUES 
('$register_user', '$register_pass', '$row[period_start]', '$row[period_end]', '$row[admin_id]', '$row[assignTime]', '$t')";
            mysqli_query($conn, $registerSQL);
            $_SESSION['permissionType'] = 3;
            break;
    }
    $deleteSQL = "DELETE FROM inv_code WHERE inv_code = '$register_inv_code'";
    mysqli_query($conn, $deleteSQL);
    $conn->close();
    echo "<script>alert('注册成功，请重新登录'); location.href='../index.php';</script>";
}