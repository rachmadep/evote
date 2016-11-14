<?php
include('session.php');
include 'config.php';
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id = $_GET['id'];
$username = $_POST['username'];
$oldpassword = $_POST['old_password'];
$newpassword = $_POST['new_password'];
$position = $_POST['position'];

$username = stripslashes($username);
$oldpassword = stripslashes($oldpassword);
$newpassword = stripslashes($newpassword);
$position = stripslashes($position);

$username = mysqli_real_escape_string($conn, $username);
$oldpassword = mysqli_real_escape_string($conn, $oldpassword);
$newpassword = mysqli_real_escape_string($conn, $newpassword);
$position = mysqli_real_escape_string($conn, $position);


$check_pass = mysqli_query($conn, "SELECT COUNT(*) AS total FROM admin WHERE id_admin = '$id' AND password_admin = PASSWORD('$oldpassword')");
$result = mysqli_fetch_assoc($check_pass);
if ($result['total'] > 0) {
	$update = mysqli_query($conn, "UPDATE admin SET username_admin = '$username', password_admin = PASSWORD('$newpassword'), level = '$position' WHERE id_admin = '$id'");
	header("location: user.php");
}
else{
	?>
	<script type="text/javascript">
		alert("password yang anda masukkan tidak sesuai dengan yang terdaftar");
		window.history.back(-1);
	</script>
	<?php
}
