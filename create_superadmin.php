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
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$password3=$_POST['password3'];
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$password1 = stripslashes($password1);
$password2 = stripslashes($password2);
$password3 = stripslashes($password3);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$password1 = mysqli_real_escape_string($conn, $password1);
$password2 = mysqli_real_escape_string($conn, $password2);
$password3 = mysqli_real_escape_string($conn, $password3);
$passwords = $password.''.$password1.''.$password2.''.$password3;
$query = mysqli_query($conn, "INSERT INTO admin(username_admin, password_admin, level) VALUES ('$username',PASSWORD('$passwords'),'superadmin')");
header("location: user.php");
?>