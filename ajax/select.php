<!DOCTYPE html>
<script>

</script>
<?php
require '../header/connect.php';

$q = $_GET["q"];
$sqlLT = "SELECT " . $q . " FROM info_patient";
$resultLT = $conn->query($sqlLT);

echo "<select id='selectLevelTwo' onchange='levelTwoChange()'><option value=''>请选择：</option>";
while ($rowLT = $resultLT->fetch_assoc()) {
    echo "<option value='" . $rowLT[$q] . "'>" . $rowLT[$q] . "</option>";
}
echo "</select>";
$conn->close();
