<?php
include 'config.php';
session_start();

$user_check = $_SESSION['login_user'];

$db = new Db();
$ses_sql = $db->query("select username from admin where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['username'];

if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
    die();
}