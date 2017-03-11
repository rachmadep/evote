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
    echo '<script type="text/javascript">alert("NIM atau password anda salah");</script>';
    }
}
else{
    echo '<script type="text/javascript">alert("Anda telah melakukan voting");</script>';
    // header("location: index.php");
}
mysqli_close($conn); // Closing Connection
}
}

if(isset($_SESSION['id_user'])){
header("location: index.php");
}
?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Evote User Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/fonts.googleapis.css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1 class="header-text">Pemilihan Ketua KMTNTF FT UGM 2017</h1>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3><strong class="evote">Evote</strong> Login</h3>
                            		<p>Masukkan NIM dan password</p>
                        		</div>
                        		<div class="form-top-right">
                        			<!-- <i class="fa fa-lock"></i> -->
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">NIM</label>
			                        	<input type="text" name="username" placeholder="NIM" class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password" class="form-password form-control" id="form-password">
			                        </div>
			                        <input type="submit" name="submit" class="btn" value="Masuk">
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div><img class="logo-kpu" src="image/LOGO fix.png"></div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script language="JavaScript">
        /* Disable mouse right-click on page*/
        document.addEventListener("contextmenu", function(e){
            e.preventDefault();
        }, false);
        </script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
