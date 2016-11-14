<?php
// session_start();
include('session.php');
include 'config.php';
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo $id = $_SESSION['id_user'];
$update=mysqli_query($conn, "UPDATE users SET status = '1' WHERE id_user = '$id'");
if(session_destroy()) // Destroying All Sessions
{
	header("Location: login.php"); // Redirecting To Home Page
}
?>