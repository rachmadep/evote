<?php
session_start(); // Starting Session
include 'config.php';
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
// SQL query to fetch information of registerd users and finds user match.
$query=mysqli_query($conn, "SELECT id_user, jurusan_user, status
FROM users
INNER JOIN users_password ON user_id
WHERE NIM = '".$username."'
");
$ID = mysqli_fetch_assoc($query);
$id_user = $ID['id_user'];
$jurusan = $ID['jurusan_user'];
$status = $ID['status'];
if ($status == 0) {
	$login = mysqli_query($conn, "SELECT * FROM users_password WHERE user_id = '$id_user' AND password_user = PASSWORD('$password')");
	$level = mysqli_fetch_assoc($login);
	$userid = $level['user_id'];
	$rows = mysqli_num_rows($login);
	if ($rows == 1) {
	$_SESSION['id_user']=$userid;
	$_SESSION['jurusan_user']=$jurusan; // Initializing Session
	header("location: index.php"); // Redirecting To Other Page
	} else {
	$error = "NIM or Password is invalid";
	}
}
else{
	echo '<script type="text/javascript">alert("hello!");</script>';
	// header("location: index.php");
}
mysqli_close($conn); // Closing Connection
}
}
?>