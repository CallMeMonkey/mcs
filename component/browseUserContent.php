<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/18/18
 * Time: 12:42 PM
 */
require 'header/connect.php';

$getAdminSQL = "SELECT * FROM info_admin";
$resultAdmin = $conn->query($getAdminSQL);

$getUserSQL = "SELECT * FROM info_user LEFT JOIN info_admin ON info_user.assignBy=info_admin.admin_id";
$resultUser = $conn->query($getUserSQL);

$getVisitorSQL = "SELECT * FROM info_visitor LEFT JOIN info_admin ON info_visitor.assignBy=info_admin.admin_id";
$resultVisitor = $conn->query($getVisitorSQL);
?>
<div class="content floatRight">
    <div class="bu">
        <h2>全部用户信息</h2>
        <h3>管理员信息</h3>
        <table>
            <tr>
                <th>序号</th>
                <th>管理员账号</th>
            </tr>
            <?php
            $countAdmin = 1;
            while ($rowAdmin = $resultAdmin->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $countAdmin . "</td>";
                echo "<td>" . $rowAdmin["admin_name"] . "</td>";
                echo "</tr>";
                $countAdmin++;
            }
            ?>
        </table>
        <h3>用户信息</h3>
        <table>
            <tr>
                <th>序号</th>
                <th>用户账号</th>
                <th>登录日期开始于</th>
                <th>登录日期结束于</th>
                <th>邀请人</th>
                <th>邀请于</th>
                <th>用户注册时间</th>
            </tr>
            <?php
            $countUser = 1;
            while ($rowUser = $resultUser->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $countUser . "</td>";
                echo "<td>" . $rowUser["user_name"] . "</td>";
                echo "<td>" . date("Y-m-d", $rowUser["period_start"]) . "</td>";
                echo "<td>" . date("Y-m-d", $rowUser["period_end"]) . "</td>";
                echo "<td>" . $rowUser["admin_name"] . "</td>";
                echo "<td>" . date("Y-m-d H:i:s", $rowUser["assignTime"]) . "</td>";
                echo "<td>" . date("Y-m-d H:i:s", $rowUser["registerTime"]) . "</td>";
                echo "</tr>";
                $countUser++;
            }
            ?>
        </table>
        <h3>访客信息</h3>
        <table>
            <tr>
                <th>序号</th>
                <th>访客账号</th>
                <th>登录日期开始于</th>
                <th>登录日期结束于</th>
                <th>邀请人</th>
                <th>邀请于</th>
                <th>用户注册时间</th>
            </tr>
            <?php
            $countVisitor = 1;
            while ($rowVisitor = $resultVisitor->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $countVisitor . "</td>";
                echo "<td>" . $rowVisitor["visitor_name"] . "</td>";
                echo "<td>" . date("Y-m-d", $rowVisitor["period_start"]) . "</td>";
                echo "<td>" . date("Y-m-d", $rowVisitor["period_end"]) . "</td>";
                echo "<td>" . $rowVisitor["admin_name"] . "</td>";
                echo "<td>" . date("Y-m-d H:i:s", $rowVisitor["assignTime"]) . "</td>";
                echo "<td>" . date("Y-m-d H:i:s", $rowVisitor["registerTime"]) . "</td>";
                echo "</tr>";
                $countVisitor++;
            }
            ?>
        </table>
    </div>
</div>
<?php
$conn->close();
?>
