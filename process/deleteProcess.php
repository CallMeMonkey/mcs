<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/21/18
 * Time: 11:14 AM
 */
require '../header/connect.php';

$deleteInfo = "DELETE FROM info_patient WHERE patient_id='$_POST[deletePatient]'";
$deleteText = "DELETE FROM info_addition WHERE patient_id='$_POST[deletePatient]'";
$deleteImg = "DELETE FROM info_image WHERE patient_id='$_POST[deletePatient]'";
$deleteDoc = "DELETE FROM info_doc WHERE patient_id='$_POST[deletePatient]'";
$conn->query($deleteInfo);
$conn->query($deleteText);
$conn->query($deleteImg);
$conn->query($deleteDoc);

echo "<script>";
echo "alert('删除病历成功！');";
echo "window.location.href = '../browsePatient.php';";
echo "</script>";