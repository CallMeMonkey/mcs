<?php
/**
 * Created by PhpStorm.
 * User: hcall
 * Date: 12/21/2018
 * Time: 13:12
 */
require '../header/connect.php';

$q = $_GET["q"];

$sqlUser = "SELECT user_name FROM info_user WHERE user_name='" . $q . "'";
$resultUser = $conn->query($sqlUser);

$sqlVisitor = "SELECT visitor_name FROM info_visitor WHERE visitor_name='" . $q . "'";
$resultVisitor = $conn->query($sqlVisitor);

if ($resultUser->num_rows == 1 || $resultVisitor->num_rows == 1)
    echo "1";
else
    echo "0";
$conn->close();