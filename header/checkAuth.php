<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/17/18
 * Time: 10:40 AM
 */
session_start();
if (!isset($_SESSION['code'])) {
    echo "<script>alert('请登录！'); location.href='index.php';</script>";
}