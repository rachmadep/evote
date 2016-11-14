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
$user_check=$_SESSION['id_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn, "select * from users where id_user='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['NIM'];
if(!isset($login_session)){
mysqli_close($conn); // Closing Connection
header('Location: login.php'); // Redirecting To Home Page
}
?>