<?php

include_once ('config.php');

session_start();

$user_check = $_SESSION['login_user'];

$row = $db->query("select username from user where username = ?", $user_check)->fetchArray();

$login_session = $row['username'];

if (!isset($_SESSION['login_user'])) {
    header("location:/admin/login.php");
    die();
}