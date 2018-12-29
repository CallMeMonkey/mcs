<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/26/18
 * Time: 10:32 PM
 */
require 'header/connect.php';

$patientSQL = "SELECT * FROM info_patient";
$getAllPatient = $conn->query($patientSQL);
?>
<div class="content floatRight">
    <div class="bp">
        <h2>全部病历信息</h2>
        <input type="text" class="bp_search" placeholder="> 快速搜索" id="browseInput" onkeyup="browseSearch()"/>
        <table id="browseTable">
            <tr>
                <th>序号</th>
                <th>创建时间</th>
                <th>创建人</th>
                <th>登记号</th>
                <th>就诊时间</th>
                <th>病例号</th>
                <th>女方姓名</th>
                <th>女方年龄</th>
                <th>女方电话</th>
                <th>男方姓名</th>
                <th>男方年龄</th>
                <th>男方电话</th>
                <th>查看详情</th>
            </tr>
            <?php
            $countPatient = 1;
            while($row = $getAllPatient->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $countPatient . "</td>";
                echo "<td>" . date("Y-m-d", $row["createTime"]) . "</td>";
                echo "<td>" . $row["createBy"] . "</td>";
                echo "<td>" . $row["sign_id"] . "</td>";
                echo "<td>" . $row["comeTime"] . "</td>";
                echo "<td>" . $row["doc_id"] . "</td>";
                echo "<td>" . $row["f_name"] . "</td>";
                echo "<td>" . $row["f_age"] . "</td>";
                echo "<td>" . $row["f_tel"] . "</td>";
                echo "<td>" . $row["m_name"] . "</td>";
                echo "<td>" . $row["m_age"] . "</td>";
                echo "<td>" . $row["m_tel"] . "</td>";
                echo "<td><form method='post' action='patientDetail.php'>";
                echo "<input value='" . $row["patient_id"] . "' type='hidden' name='passPatient' />";
                echo "<input class='detailBtn' type='submit' value='详情'/>";
                echo "</form></td>";
                echo "</tr>";
                $countPatient++;
            }
            ?>
        </table>
    </div>
</div>
