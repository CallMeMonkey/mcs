<?php
/**
 * Created by PhpStorm.
 * User: hcall
 * Date: 01/14/2019
 * Time: 16:53
 */
require 'header/connect.php';
?>
<div class="content floatRight">
    <div class="backup">
        <h2>数据备份与还原</h2>
        <h3>数据备份</h3>
        <form action="process/backupProcess.php" method="post">
            <input type="submit" class="bt" value="备份"/>
        </form>
        <div class="bu">
            <?php
            $check = "select ia.admin_name, ib.backup_date, ib.backup_version 
from info_backup ib
left join info_admin ia
on ib.backup_admin = ia.admin_id";
            $result = $conn->query($check);
            if ($result->num_rows == 0) {
                echo "<h3>无备份记录，请点击按钮进行备份</h3>";
            } else {
                echo "<table>";
                $index = 1;
                echo "<tr><th>序号</th><th>备份人</th><th>备份时间</th><th>备份版本</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $index . "</td>";
                    echo "<td>" . $row['admin_name'] . "</td>";
                    echo "<td>" . date("Y-m-d H-i", $row['backup_date']) . "</td>";
                    echo "<td>" . $row['backup_version'] . "</td>";
                    $index++;
                }
                echo "</table>";
            }
            ?>
        </div>
        <h3>数据还原</h3>
    </div>
</div>
