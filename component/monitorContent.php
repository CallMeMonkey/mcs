<?php
/**
 * Created by PhpStorm.
 * User: hcall
 * Date: 01/22/2019
 * Time: 18:57
 */
require 'header/connect.php';
require 'data/tableData.php';
?>
<div class="content floatRight">
    <div class="monitor">
        <h2>系统监控</h2>
        <h3><i class="fas fa-database" style="margin-right: 10px;"></i>数据库信息监控</h3>
        <table>
            <tr>
                <th style="width: 150px;">类别</th>
                <th style="width: 50px;">状态</th>
                <th style="width: 300px;">内容</th>
            </tr>
            <tr>
                <td>数据库连接</td>
                <?php
                if ($conn->connect_error) {
                    echo "<td><i class=\"fas fa-times-circle\" style='color: red;'></i></td>";
                    echo "<td>数据库连接失败，请联系管理员:" . $conn->connect_error . "</td>";
                }
                else {
                    echo "<td><i class=\"fas fa-check-circle\" style='color: green;'></i></td>";
                    echo "<td>数据库运行正常</td>";
                }
                ?>
            </tr>
            <?php
            for ($i=0; $i<count($tableName); $i++) {
                $sql = "SHOW tables LIKE '" . $tableName[$i] . "'";
                if (($conn->query($sql))->num_rows == 1) {
                    echo "<tr>";
                    echo "<td>" . $tableNameCN[$i] . "</td>";
                    echo "<td><i class=\"fas fa-check-circle\" style='color: green;'></i></td>";
                    echo "<td>运行正常</td>";
                    echo "</tr>";
                } else {
                    echo "<tr>";
                    echo "<td>" . $tableNameCN[$i] . "</td>";
                    echo "<td><i class=\"fas fa-times-circle\" style='color: red;'></i></td>";
                    echo "<td>运行异常或信息未创建</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <h3><i class="fas fa-folder" style="margin-right: 10px;"></i>文件夹信息监控</h3>
        <table>
            <tr>
                <th style="width: 150px;">类别</th>
                <th style="width: 50px;">状态</th>
                <th style="width: 300px;">内容</th>
            </tr>
            <?php
            //Addition image folder
            echo "<tr>";
            $folderImage = "D:\MedicalCaseSystem\patientImg\\";
            if (file_exists($folderImage)) {
                echo "<td>附属图片文件夹</td>";
                echo "<td><i class=\"fas fa-check-circle\" style='color: green;'></i></td>";
                echo "<td>文件夹地址正常</td>";
            } else {
                echo "<td>附属图片文件夹</td>";
                echo "<td><i class=\"fas fa-times-circle\" style='color: red;'></i></td>";
                echo "<td>文件夹异常或不存在</td>";
            }
            echo "</tr>";
            //Addition document folder
            echo "<tr>";
            $folderDoc = "D:\MedicalCaseSystem\patientDoc\\";
            if (file_exists($folderDoc)) {
                echo "<td>附属文档文件夹</td>";
                echo "<td><i class=\"fas fa-check-circle\" style='color: green;'></i></td>";
                echo "<td>文件夹地址正常</td>";
            } else {
                echo "<td>附属文档文件夹</td>";
                echo "<td><i class=\"fas fa-times-circle\" style='color: red;'></i></td>";
                echo "<td>文件夹异常或不存在</td>";
            }
            echo "</tr>";
            //Backup folder
            echo "<tr>";
            $folderBackup = "D:\MedicalCaseSystem\backup\\";
            if (file_exists($folderBackup)) {
                echo "<td>备份文件夹</td>";
                echo "<td><i class=\"fas fa-check-circle\" style='color: green;'></i></td>";
                echo "<td>文件夹地址正常</td>";
            } else {
                echo "<td>备份文件夹</td>";
                echo "<td><i class=\"fas fa-times-circle\" style='color: red;'></i></td>";
                echo "<td>文件夹异常或不存在</td>";
            }
            echo "</tr>";
            ?>
        </table>
    </div>
</div>