<?php
/**
 * Created by PhpStorm.
 * User: hcall
 * Date: 12/10/2018
 * Time: 17:11
 */
require '../header/connect.php';
require '../data/columnData.php';

$updateSQL = "UPDATE info_patient SET ";
for ($i=0; $i<44; $i++) {
    $updateSQL .= $itemName[$i];
    $updateSQL .= "='";
    $updateSQL .= $_POST[$itemName[$i]];
    if ($i != 43)
        $updateSQL .= "', ";
}
$updateSQL .= "' WHERE patient_id=";
$updateSQL .= $_POST['editPatient'];

$link = "../patientDetail.php?passPatient=" . $_POST['editPatient'];
if ($conn->query($updateSQL) === TRUE) {
    echo "<script>";
    echo "alert('修改病历成功！');";
    $conn->close();
    echo "window.location.href = '" . $link . "';";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('修改病历失败，请联系管理员：" . $conn->error . "');";
    $conn->close();
    echo "window.location.href = '" . $link . "';";
    echo "</script>";
}