<?php
include('session.php');
include 'config.php';
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$username=$_POST['username'];
$password=$_POST['password'];
$position=$_POST['position'];
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$position = stripslashes($position);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$position = mysqli_real_escape_string($conn, $position);
$query = mysqli_query($conn, "INSERT INTO admin(username_admin, password_admin, level) VALUES ('$username',PASSWORD('$password'),'$position')");
header("location: user.php");
?>