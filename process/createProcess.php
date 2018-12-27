<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/21/18
 * Time: 11:14 AM
 */
require '../header/connect.php';

//存储通用信息
$t = time();
session_start();
$permissionType = $_SESSION['permissionType'];
$current_user = $_SESSION['current_user'];
$generalSQL = "INSERT INTO info_patient 
(sign_id, comeTime, doc_id, createTime, createType, createBy, 
f_name, f_age, f_profession, f_ethnic, f_education, f_tel, f_identity, f_birth, 
address, m_name, m_age, m_profession, m_ethnic, m_education, m_tel, m_identity, m_birth, 
p_main, p_history_now, p_symptom, p_history_person, p_history_back, p_history_family, p_history_period, 
p_history_pregnancy, p_height, p_weight, p_bmi, p_waistline, p_hip, p_ratio, p_sds, p_sas,
p_hair, p_breast, p_gynecology, p_b, p_western, p_eastern, p_license, p_plan) 
VALUES ('$_POST[sign_id]', 
'$_POST[comeTime]', 
'$_POST[doc_id]', 
'$t', 
'$permissionType', 
'$current_user', 
'$_POST[f_name]', '$_POST[f_age]', '$_POST[f_profession]', '$_POST[f_ethnic]', '$_POST[f_education]', '$_POST[f_tel]', '$_POST[f_identity]', '$_POST[f_birth]', 
'$_POST[address]', 
'$_POST[m_name]', '$_POST[m_age]', '$_POST[m_profession]', '$_POST[m_ethnic]', '$_POST[m_education]', '$_POST[m_tel]', '$_POST[m_identity]', '$_POST[m_birth]', 
'$_POST[p_main]', '$_POST[p_history_now]', '$_POST[p_symptom]', '$_POST[p_history_person]', '$_POST[p_history_back]', 
'$_POST[p_history_family]', '$_POST[p_history_period]', '$_POST[p_history_pregnancy]', 
'$_POST[p_height]', '$_POST[p_weight]', '$_POST[p_bmi]', '$_POST[p_waistline]', '$_POST[p_hip]', 
'$_POST[p_ratio]', '$_POST[p_sds]', '$_POST[p_sas]', 
'$_POST[p_hair]', '$_POST[p_breast]', '$_POST[p_gynecology]', 
'$_POST[p_b]', '$_POST[p_western]', '$_POST[p_eastern]', 
'$_POST[p_license]', '$_POST[p_plan]')";
$conn->query($generalSQL);

//获取patient_id
$patient_id = $conn->insert_id;

//附属文字信息
$countText = $_POST['additionTextCount'];
if ($countText != 0) {
    for ($i=1; $i<=$countText; $i++) {
        $additionTitle = "additionTitle_" . $i;
        $additionContent = "additionContent_" . $i;
        $textSQL = "INSERT INTO info_addition (patient_id, addition_title, addition_content) VALUES ('$patient_id', '$_POST[$additionTitle]', '$_POST[$additionContent]')";
        $conn->query($textSQL);
    }
}

//附属图片信息
$countImg = $_POST['additionPicCount'];
if ($countImg != 0) {
    $target_img = "D:\MedicalCaseSystem\patientImg\\";
    for ($i=1; $i<=$countImg; $i++) {
        $imgName = "additionPic_" . $i;
        $target_img_file = $target_img . $patient_id . "_" . basename($_FILES[$imgName]["name"]);
        move_uploaded_file($_FILES[$imgName]["tmp_name"], $target_img_file);
        $imgSQL = "INSERT INTO info_image (patient_id, image_address) VALUES ('$patient_id', '$target_img_file')";
        $conn->query($imgSQL);
    }
}

//附属文档信息
$countDoc = $_POST['additionDocCount'];
if ($countDoc != 0) {
    $target_doc = "D:\MedicalCaseSystem\patientDoc\\";
    for ($i=1; $i<=$countDoc; $i++) {
        $docName = "additionDoc_" . $i;
        $target_doc_file = $target_doc . $patient_id . "_" . basename($_FILES[$docName]["name"]);
        move_uploaded_file($_FILES[$docName]["tmp_name"], $target_doc_file);
        $docSQL = "INSERT INTO info_doc (patient_id, doc_address) VALUES ('$patient_id', '$target_doc_file')";
        $conn->query($docSQL);
    }
}

$conn->close();

echo "<script>";
echo "alert('创建新病历成功！');";
echo "window.location.href = '../create.php';";
echo "</script>";