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
	if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['username2']) || empty($_POST['password2'])) {
		$error = "Username or Password is invalid";
	}
	else
	{
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
		$username2=$_POST['username2'];
		$password2=$_POST['password2'];// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);
		$username2 = stripslashes($username2);
		$password2 = stripslashes($password2);
		$username2 = mysqli_real_escape_string($conn, $username2);
		$password2 = mysqli_real_escape_string($conn, $password2);
		// SQL query to fetch information of registerd users and finds user match.
		$query = mysqli_query($conn, "select * from admin where password_admin=PASSWORD('$password') AND username_admin='$username'");
		$level = mysqli_fetch_assoc($query);
		$userlevel = $level['level'];
		$userid = $level['id_admin'];
		$nameuser = $level['username_admin'];

		$query2 = mysqli_query($conn, "select * from admin where password_admin=PASSWORD('$password2') AND username_admin='$username2'");
		$level2 = mysqli_fetch_assoc($query2);
		$userlevel2 = $level2['level'];
		$userid2 = $level2['id_admin'];
		$nameuser2 = $level2['username_admin'];

		if ($userlevel == 'admin') {
			if ($_POST['username'] == $_POST['username2']) {
				echo '<script type="text/javascript">
						alert("username1 dan username2 anda sama");
						window.history.back(-1);
					</script>';
			}
			else{
				$rows = mysqli_num_rows($query);
				$rows2 = mysqli_num_rows($query2);
				if (($rows == 1) && ($rows2 == 1)) {
					$_SESSION['login_user']=$userid;
					$_SESSION['name_user']=$nameuser;
					$_SESSION['level_user']=$userlevel; // Initializing Session
					$_SESSION['time'] = time();
					$_SESSION['login_user2']=$userid2;
					$_SESSION['name_user2']=$nameuser2;
					$_SESSION['level_user2']=$userlevel2; // Initializing Session					
					header("location: admin.php");
				} 
				else {
					echo '<script type="text/javascript">
						alert("username atau password yang anda masukkan salah");
						window.history.back(-1);
					</script>';
				}
			}
		}
		else if ($userlevel == 'superadmin') {
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
		}
		mysqli_close($conn); // Closing Connection
		
	}
}
?>