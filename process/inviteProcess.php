<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/17/18
 * Time: 3:55 PM
 */
require '../header/connect.php';

$startTime = strtotime($_POST["startTime"]);
$endTime = strtotime($_POST["endTime"]);
$permission = $_POST["permission"];
session_start();
$admin_id = $_SESSION['current_id'];
$t = time();

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < 5; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}

$sql = "INSERT INTO inv_code (inv_code, period_start, period_end, permission, admin_id, assignTime) VALUES ('$randomString', '$startTime',
 '$endTime', '$permission', '$admin_id', '$t')";
if ($conn->query($sql) === TRUE) {
    echo "<script>";
    echo "alert('成功创建新用户，请记录此邀请码：" . $randomString . "');";
    echo "window.location.href = '../invite.php';";
    echo "</script>";
} else {
    echo "出现错误，请反馈此错误: " . $sql . "<br>" . $conn->error;
}
$conn->close();