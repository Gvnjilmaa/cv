<?php
$host = 'localhost';
$db = 'your_database_name';
$user = 'your_db_username';
$pass = 'your_db_password';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Холболт амжилтгүй: " . $conn->connect_error);
}
?>
