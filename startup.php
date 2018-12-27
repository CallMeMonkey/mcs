<?php
$servername = "localhost";
$username = "root";
$password = "";

//Connect to server
$connection = mysqli_connect($servername, $username, $password);
if (!$connection) {
    die("连接出错：" . mysqli_connect_error());
}
echo "连接成功！" . "<br>";

//Create database
$createDB = "
CREATE DATABASE mcs DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
if ($connection->query($createDB) === TRUE) {
    echo "数据库创建成功！" . "<br>";
} else {
    echo "数据库创建失败：" . $connection->error;
}

$dbname = "mcs";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Create tables
$create_admin_info = "CREATE TABLE info_admin(
    admin_id INT NOT NULL AUTO_INCREMENT,
    admin_name VARCHAR(20) NOT NULL,
    admin_pass VARCHAR(40) NOT NULL,
    PRIMARY KEY ( admin_id )
 )";

$create_user_info = "CREATE TABLE info_user(
    user_id INT NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(20) NOT NULL,
    user_pass VARCHAR(40) NOT NULL,
    period_start INT NOT NULL,
    period_end INT NOT NULL,
    assignBy INT NOT NULL,
    assignTime INT NOT NULL,
    registerTime INT NOT NULL,
    PRIMARY KEY ( user_id )
 )";

$create_visitor_info = "CREATE TABLE info_visitor(
    visitor_id INT NOT NULL AUTO_INCREMENT,
    visitor_name VARCHAR(20) NOT NULL,
    visitor_pass VARCHAR(40) NOT NULL,
    period_start INT NOT NULL,
    period_end INT NOT NULL,
    assignBy INT NOT NULL,
    assignTime INT NOT NULL,
    registerTime INT NOT NULL,
    PRIMARY KEY ( visitor_id )
 )";

$create_inv_code = "CREATE TABLE inv_code(
    inv_id INT NOT NULL AUTO_INCREMENT,
    inv_code VARCHAR(10) NOT NULL,
    period_start INT NOT NULL,
    period_end INT NOT NULL,
    permission TINYINT NOT NULL,
    admin_id INT NOT NULL,
    assignTime INT NOT NULL,
    PRIMARY KEY ( inv_id )
 )";

$create_patient_info = "CREATE TABLE info_patient(
    patient_id INT NOT NULL AUTO_INCREMENT,
    createTime INT NOT NULL,
    createType TINYINT NOT NULL,
    createBy VARCHAR(255) NOT NULL,
    sign_id VARCHAR(255) NOT NULL,
    comeTime DATE NOT NULL,
    doc_id VARCHAR(255) NOT NULL,
    f_name VARCHAR(255) NOT NULL,
    f_age VARCHAR(10) NOT NULL,
    f_profession VARCHAR(255) NOT NULL,
    f_ethnic VARCHAR(255) NOT NULL,
    f_education VARCHAR(255) NOT NULL,
    f_tel VARCHAR(255) NOT NULL,
    f_identity VARCHAR(255) NOT NULL,
    f_birth DATE NOT NULL,
    address VARCHAR(255) NOT NULL,
    m_name VARCHAR(255) NOT NULL,
    m_age VARCHAR(10) NOT NULL,
    m_profession VARCHAR(255) NOT NULL,
    m_ethnic VARCHAR(255) NOT NULL,
    m_education VARCHAR(255) NOT NULL,
    m_tel VARCHAR(255) NOT NULL,
    m_identity VARCHAR(255) NOT NULL,
    m_birth DATE NOT NULL,
    p_main VARCHAR(255) NOT NULL,
    p_history_now VARCHAR(255) NOT NULL,
    p_symptom VARCHAR(255) NOT NULL,
    p_history_person VARCHAR(255) NOT NULL,
    p_history_back VARCHAR(255) NOT NULL,
    p_history_family VARCHAR(255) NOT NULL,
    p_history_period VARCHAR(255) NOT NULL,
    p_history_pregnancy VARCHAR(255) NOT NULL,
    p_height VARCHAR(255) NOT NULL,
    p_weight VARCHAR(255) NOT NULL,
    p_hair VARCHAR(255) NOT NULL,
    p_breast VARCHAR(255) NOT NULL,
    p_gynecology VARCHAR(255) NOT NULL,
    p_b VARCHAR(255) NOT NULL,
    p_western VARCHAR(255) NOT NULL,
    p_eastern VARCHAR(255) NOT NULL,
    p_plan VARCHAR(255) NOT NULL,
    p_bmi VARCHAR(255) NOT NULL,
    p_waistline VARCHAR(255) NOT NULL,
    p_hip VARCHAR(255) NOT NULL,
    p_ratio VARCHAR(255) NOT NULL,
    p_sds VARCHAR(255) NOT NULL,
    p_sas VARCHAR(255) NOT NULL,
    p_license VARCHAR(255) NOT NULL,
    PRIMARY KEY (patient_id)
)";

$create_info_addition = "CREATE TABLE info_addition(
    addition_id INT NOT NULL AUTO_INCREMENT,
    patient_id INT NOT NULL,
    addition_title VARCHAR(255) NOT NULL,
    addition_content VARCHAR(255) NOT NULL,
    PRIMARY KEY ( addition_id )
 )";
$create_info_image = "CREATE TABLE info_image(
    image_id INT NOT NULL AUTO_INCREMENT,
    patient_id INT NOT NULL,
    image_address VARCHAR(255) NOT NULL,
    PRIMARY KEY ( image_id )
 )";
$create_info_doc = "CREATE TABLE info_doc(
    doc_id INT NOT NULL AUTO_INCREMENT,
    patient_id INT NOT NULL,
    doc_address VARCHAR(255) NOT NULL,
    PRIMARY KEY ( doc_id )
 )";

if ($conn->query($create_admin_info) === TRUE &&
$conn->query($create_user_info) === TRUE &&
$conn->query($create_visitor_info) === TRUE &&
$conn->query($create_inv_code) === TRUE &&
$conn->query($create_patient_info) === TRUE &&
$conn->query($create_info_addition) === TRUE &&
$conn->query($create_info_image) === TRUE &&
$conn->query($create_info_doc) === TRUE) {
    echo "数据表创建成功！" . "<br>";
} else {
    echo "数据表创建出错：" . $conn->error;
}

//Initial data list
$alert_admin_info = "alter table info_admin AUTO_INCREMENT=1001";
$alert_user_info = "alter table info_user AUTO_INCREMENT=1001";
$alert_visitor_info = "alter table info_visitor AUTO_INCREMENT=1001";
$alert_inv_code = "alter table inv_code AUTO_INCREMENT=1001";
$alert_patient_info = "alter table info_patient AUTO_INCREMENT=10001";
$alert_info_addition = "alter table info_addition AUTO_INCREMENT=1001";
$alert_info_image = "alter table info_image AUTO_INCREMENT=1001";
$alert_info_doc = "alter table info_doc AUTO_INCREMENT=1001";

if ($conn->query($alert_admin_info) === TRUE &&
$conn->query($alert_user_info) === TRUE &&
$conn->query($alert_visitor_info) === TRUE &&
$conn->query($alert_inv_code) === TRUE &&
$conn->query($alert_patient_info) === TRUE &&
$conn->query($alert_info_addition) === TRUE &&
$conn->query($alert_info_image) === TRUE &&
$conn->query($alert_info_doc) === TRUE) {
    echo "数据表规范！" . "<br>";
} else {
    echo "数据表规范出错：" . $conn->error;
}

//Create first admin account
$first_admin = "INSERT INTO info_admin (admin_name, admin_pass) VALUES ('admin','medical')";
if (mysqli_query($conn, $first_admin)) {
    echo "管理员帐号创建成功！" . "<br>";
} else {
    echo "管理员帐号创建出错：" . "<br>" . mysqli_error($conn);
}


$conn->close();
?>