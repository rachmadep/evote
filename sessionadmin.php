<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include 'config.php';
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Selecting Database
session_start();// Starting Session


// Storing Session
$user_check=$_SESSION['login_user'];
$user_check2=$_SESSION['login_user2'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn, "select * from admin where id_admin='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$ses_sql2=mysqli_query($conn, "select * from admin where id_admin='$user_check2'");
$row2 = mysqli_fetch_assoc($ses_sql2);
$login_session =$row['username_admin'];
$level =$row['level'];
$login_session2 =$row2['username_admin'];
if ($level == 'admin') {
	if(!isset($login_session) || !isset($login_session2)){
		mysqli_close($conn); // Closing Connection
		header('Location: login-admin.php'); // Redirecting To Home Page
	}
}
else if ($level == 'superadmin') {
	if(!isset($login_session)){
		mysqli_close($conn); // Closing Connection
		header('Location: login-admin.php'); // Redirecting To Home Page
	}
}

?>