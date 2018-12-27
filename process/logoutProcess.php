<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/13/18
 * Time: 8:35 PM
 */
session_start();
if(session_destroy()) {
    header("Location: ../index.php");
}