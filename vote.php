<?php
include('session.php');
include 'config.php';
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
date_default_timezone_set('Asia/Bangkok');
$logintime = date('d/m/Y H:i:s');
$choice = $_GET['choice'];
$id_user = $_SESSION['id_user'];
$check = mysqli_query($conn, "SELECT COUNT(*) AS total FROM result WHERE userID = '$id_user'");
$show = mysqli_fetch_assoc($check);
if ($show['total'] == 0) {
	$insert=mysqli_query($conn, "INSERT INTO result(userID, choice) VALUES ('$id_user', '$choice')");
	$update=mysqli_query($conn, "UPDATE users SET status = '1', logintime = '$logintime' WHERE id_user = '$id_user'");
	echo '<script type="text/javascript">
		alert("Pilihan anda sudah masuk ke dalam database kami. Terima kasih telah melakukan voting");
		window.location.assign("logout.php");
	</script>';
}
else
	header('location: logout.php');

?>