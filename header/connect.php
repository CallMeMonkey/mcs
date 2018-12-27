<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/13/18
 * Time: 1:48 PM
 */
$servername = "localhost";
$username = "root";
$password = "";
$database = "mcs";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error)
    die("数据库连接失败，请联系管理员！" . $conn->connect_error);
mysqli_set_charset($conn, "utf8mb4");