<?php
/**
 * Created by PhpStorm.
 * User: hcall
 * Date: 01/08/2019
 * Time: 15:46
 */
require '../header/connect.php';
require '../data/version.php';

$tableName = array("info_addition", "info_admin", "info_backup", "info_doc", "info_image", "info_patient", "info_user",
    "info_visitor", "inv_code");

$t = time();
//Backup path for Windows
$path = "C:\\" . "\\" . "MedicalCaseSystem\\" . "\\" . "backup\\" . "\\";

//Backup method for Windows
for ($i=0; $i<count($tableName); $i++) {
    $path_name = $path . date("Y-m-d", $t) . "_" . $versionNumber . "_" . $tableName[$i] . ".sql";
    $sql = "SELECT * INTO OUTFILE '$path_name' FROM " . $tableName[$i];

    $result = $conn->query($sql);

    if($result)
        echo 'GOOD';
    else
        die($conn->error);
}

$conn->close();