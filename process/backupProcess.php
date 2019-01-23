<?php
/**
 * Created by PhpStorm.
 * User: hcall
 * Date: 01/08/2019
 * Time: 15:46
 */
require '../header/connect.php';
require '../data/version.php';

require '../data/tableData.php';

$t = time();
//Backup path for Windows
$path = "C:\\" . "\\" . "MedicalCaseSystem\\" . "\\" . "backup\\" . "\\";

if (file_exists($path)) {
    session_start();
    $current_user = $_SESSION['current_id'];
    echo $current_user;
    $sql = "INSERT INTO info_backup (backup_admin, backup_date, backup_version) VALUES (
    '$current_user', '$t', '$versionNumber'
)";
    $conn->query($sql);

    //Backup method for Windows
    for ($i=0; $i<count($tableName); $i++) {
        $path_name = $path . date("Y-m-d-H-i", $t) . "_" . $versionNumber . "_" . $tableName[$i] . ".sql";
        $backup = "SELECT * INTO OUTFILE '$path_name' FROM " . $tableName[$i];

        $result = $conn->query($backup);

        if(!$result)
            die($conn->error);
    }
    echo "<script>";
    echo "alert('备份成功！');";
    echo "window.location.href = '../backup.php';";
    echo "</script>";
    $conn->close();
}
else {
    echo "<script>";
    echo "alert('备份失败，请参考使用手册创建文件夹');";
    echo "window.location.href = '../backup.php';";
    echo "</script>";
}

/*
//Backup method for Windows
for ($i=0; $i<count($tableName); $i++) {
    $path_name = $path . date("Y-m-d", $t) . "_" . $versionNumber . "_" . $tableName[$i] . ".sql";
    $sql = "SELECT * INTO OUTFILE '$path_name' FROM " . $tableName[$i];

    $result = $conn->query($sql);

    if($result)
        echo 'GOOD';
    else
        die($conn->error);
}*/