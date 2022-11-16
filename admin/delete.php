<?php include 'classes/session.php';
$database = new Db();
$deleted = $database->query("DELETE FROM `" . $_GET['tbl'] . "` WHERE id=" . $_GET['id'] . "");
header("location:" . $_GET["location"] . "");