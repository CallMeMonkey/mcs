<?php
//修改数据库文件

$servername = "localhost";
$username = "root";
$password = "";

//Connect to server
$connection = mysqli_connect($servername, $username, $password);
if (!$connection) {
    die("连接出错：" . mysqli_connect_error());
}
echo "连接成功！" . "<br>";

$dbname = "mcs";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sqlDROP = "ALTER TABLE info_patient 
DROP COLUMN p_hormone,
DROP COLUMN p_contrast,
DROP COLUMN p_biopsy,
DROP COLUMN p_inspect;";

$sqlINSERT = "ALTER TABLE info_patient ADD p_bmi VARCHAR(255) NOT NULL,
ADD p_waistline VARCHAR(255) NOT NULL,
ADD p_hip VARCHAR(255) NOT NULL,
ADD p_ratio VARCHAR(255) NOT NULL,
ADD p_sds VARCHAR(255) NOT NULL,
ADD p_sas VARCHAR(255) NOT NULL,
ADD p_license VARCHAR(255) NOT NULL;";

/*
if ($conn->query($sqlDROP) === TRUE &&
$conn->query($sqlINSERT) === TRUE) {
    echo "数据表更新成功！" . "<br>";
} else {
    echo "数据表更新出错：" . $conn->error;
}*/

$sqlChange = "ALTER TABLE inv_code MODIFY COLUMN admin_id INT NOT NULL";
if ($conn->query($sqlChange) === TRUE) {
    echo "数据表更新成功！" . "<br>";
} else {
    echo "数据表更新出错：" . $conn->error;
}

$conn->close();