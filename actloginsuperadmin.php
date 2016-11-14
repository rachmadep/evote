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
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password1']) || empty($_POST['password2']) || empty($_POST['password3'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$password3=$_POST['password3'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

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
// SQL query to fetch information of registerd users and finds user match.
$passwords = $password.''.$password1.''.$password2.''.$password3;
$query = mysqli_query($conn, "select * from admin where password_admin=PASSWORD('$passwords') AND username_admin='$username'");
$level = mysqli_fetch_assoc($query);
$userlevel = $level['level'];
$userid = $level['id_admin'];
$nameuser = $level['username_admin'];	
$rows = mysqli_num_rows($query);
if ($rows == 1) {
	$_SESSION['login_user']=$userid;
	$_SESSION['name_user']=$nameuser;
	$_SESSION['level_user']=$userlevel; // Initializing Session
	$_SESSION['time'] = time();
	header("location: admin.php");
} 
else {
	echo '<script type="text/javascript">
		alert("username atau password yang anda masukkan salah");
		window.history.back(-1);
	</script>';
}
mysqli_close($conn); // Closing Connection
}
}
?>