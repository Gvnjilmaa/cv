<?php
session_start();
require 'db_connect.php';
$id = $_GET['id'];
$conn->query("DELETE FROM projects WHERE id=$id");
header("Location: admin_dashboard.php");
exit();
?>
