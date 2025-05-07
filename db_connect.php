<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "mywebsite";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Холболт амжилтгүй: " . $conn->connect_error);
}
?>
