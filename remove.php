<?php
include('sessionadmin.php');
include 'config.php';
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $_GET['id'];
$clear_status = mysqli_query($conn, "UPDATE users SET status = '0' WHERE id_user = '$id'");
$clear_password = mysqli_query($conn, "DELETE FROM users_password WHERE user_id = '$id'");
header("Location: log.php");

?>