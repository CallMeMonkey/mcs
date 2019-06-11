<!DOCTYPE html>
<?php
require '../header/connect.php';

$one = $_GET["one"];
$two = $_GET["two"];

$selectQuery = "SELECT * FROM info_patient WHERE " . $one . " = '" . $two . "'";
$resultSelect = $conn->query($selectQuery);
while ($rowSelect = $resultSelect->fetch_assoc()) {
    echo "<div>" . $rowSelect['sign_id'] . "</div>";
}
$conn->close();