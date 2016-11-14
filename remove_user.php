<?php
include('session.php');
include 'config.php';
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id = $_GET['id'];
$remove = mysqli_query($conn, "DELETE FROM admin WHERE id_admin = '$id'");
header("location: user.php");