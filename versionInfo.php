<?php
/**
 * Created by PhpStorm.
 * User: hcall
 * Date: 12/17/2018
 * Time: 10:17
 */
require 'header/checkAuth.php';
?>

<!DOCTYPE html>
<html>
<?php require 'header/htmlHead.php' ?>
<body>
<?php require 'component/head.php' ?>
<?php require 'component/sidebar.php' ?>
<div class="content floatRight" style="color: #454e62;">
    <!--3.3.3-->
    <h3><i class="fas fa-info-circle" style="margin-right: 10px;"></i>版本：3.3.3</h3>
    <ul style="margin: 10px;">
        <li>添加功能：注册用户名查重</li>
        <li>修复登录时间功能</li>
        <li>修复注册后登录错误</li>
        <li>修复一些显示错误</li>
        <li>优化后台代码</li>
    </ul>
    <!--3.3.2-->
    <h3><i class="fas fa-info-circle" style="margin-right: 10px;"></i>版本：3.3.2</h3>
    <ul style="margin: 10px;">
        <li>添加功能：系统更新信息</li>
        <li>修复用户无法修改病历的问题</li>
        <li>添加文件：版本信息</li>
        <li>修复一些显示错误</li>
        <li>优化后台代码</li>
    </ul>
    <!--3.3.1-->
    <h3><i class="fas fa-info-circle" style="margin-right: 10px;"></i>版本：3.3.1</h3>
    <ul style="margin: 10px;">
        <li>更新数据库信息</li>
        <li>更新初始创建数据库文件</li>
        <li>修复无法创建用户和访客的问题</li>
    </ul>
    <!--3.3.0-->
    <h3><i class="fas fa-info-circle" style="margin-right: 10px;"></i>版本：3.3.0</h3>
    <ul style="margin: 10px;">
        <li>添加功能：数据备份 *测试中*</li>
        <li>添加功能：系统监控 *测试中*</li>
        <li>更新功能：归纳导出 *测试中*</li>
    </ul>
</div>
</body>
</html>