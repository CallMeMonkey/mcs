<?php
/**
 * Created by PhpStorm.
 * User: hcall
 * Date: 12/05/2018
 * Time: 14:06
 */
$servername = "localhost";
$username = "root";
$password = "";

//Connect to server
$connection = mysqli_connect($servername, $username, $password);
if (!$connection) {
    die("连接出错：" . mysqli_connect_error());
}
echo "连接成功！" . "<br>";

//Delete the database
$dropDB = "DROP DATABASE IF EXISTS mcs;";
if ($connection->query($dropDB) === TRUE) {
    echo "数据库重置成功，请重新运行startup.php" . "<br>";
} else {
    echo "数据库重置失败：" . $connection->error;
}

$connection->close();