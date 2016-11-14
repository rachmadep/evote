<?php
error_reporting(0);
include('sessionadmin.php');
include('idle.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EvoteTeknik | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php include 'header.php';?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/admin1.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php if ($_SESSION['level_user'] == 'admin') {
                    echo $_SESSION['name_user'].' and '.$_SESSION['name_user2'];
                  } else if ($_SESSION['level_user'] == 'superadmin') {
                    echo $_SESSION['name_user'];
                  } ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
              <a href="admin.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="log.php">
                <i class="fa fa-book"></i>
                <span>Log</span>
              </a>
            </li>
            <?php if ($_SESSION['level_user'] == 'superadmin') {
            ?>
            <li>
              <a href="user.php">
                <i class="fa fa-users"></i>
                <span>User</span>
              </a>
            </li>
            <li>
              <a href="result.php">
                <i class="fa fa-pie-chart"></i>
                <span>Result</span>
              </a>
            </li>
            <?php } ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Create Password for User</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="form-group col-md-offset-3 col-md-5">
                          <label class="col-sm-2 control-label">NIM</label>
                          <div class="col-sm-8">
                            <input type="text" name="nim" class="form-control" id="nim" placeholder="Enter NIM">  
                          </div>
                          <div class="col-sm-2">
                            <input type="submit" class="btn btn-submit btn-flat btn-danger" name="submit" value="Submit">
                          </div>
                        </div>  
                      </form>
                    </div><!-- /.col -->
                    
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-12 col-xs-12">
                    <?php
                      include 'config.php';
                      $conn = new mysqli($servername, $username, $password, $database);

                      // Check connection
                      if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                      } 
                      if (isset($_POST['submit'])) {
                        $query=mysqli_query($conn, "SELECT id_user
                        FROM users
                        WHERE NIM = '".$_POST['nim']."'
                        ");
                        $ID = mysqli_fetch_assoc($query);
                        $id_user = $ID['id_user'];
                        $check = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users_password where user_id = '$id_user'");
                        $total = mysqli_fetch_assoc($check);
                        if ($total['total'] == 0) {
                          $rand = substr(md5(microtime()),rand(0,26),5);
                          echo '<b>NIM :</b> '.$_POST['nim'].'<br>';
                          echo '<b>Password :</b> '.$rand;
                          $update = mysqli_query($conn, "INSERT INTO users_password(user_id, password_user) VALUES ('$id_user', PASSWORD('$rand'))");
                        }
                        else{
                          echo '<b>NIM :</b> '.$_POST['nim'].'<br>';
                          // echo '<b>Password :</b> '.$pas=mysqli_query($conn, "SELECT password_user FROM users_password WHERE user_id = '$id_user'");
                          echo "password already created";
                        }
                      }
                      
                    ?>
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <strong>Copyright &copy; 2016 <a href="#">KPU FT UGM</a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
