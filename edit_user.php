<?php
error_reporting(0);
include('sessionadmin.php');
include('idle.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EvoteTeknik | Log</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
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
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
            <li>
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
            <li class="active">
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
            <?php }
            ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Users
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">New User</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php
                    $id = $_GET['id'];
                    $get_all = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = '$id'");
                    $data = mysqli_fetch_assoc($get_all);
                    $username = $data['username_admin'];
                    $level = $data['level'];
                  ?>
                  <form class="form-horizontal" method="POST" action="update_user.php?id=<?php echo $id;?>">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="old_password" id="old_password" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="new_password" id="new_password" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Position</label>
                        <div class="col-sm-10">
                          <select name="position" id="position" class="form-control select2" data-placeholder="Select Position" style="width: 100%;">
                            <option <?php if(strpos($level,'admin') !== false ){echo 'selected';}?> value="admin">Admin</option>
                            <option <?php if(strpos($level,'superadmin') !== false ){echo 'selected';}?> value="superadmin">Superadmin</option>
                          </select>
                        </div>
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <button type="reset" class="btn btn-default">Reset</button>
                      <button type="submit" class="btn btn-info pull-right">Update</button>
                    </div><!-- /.box-footer -->
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2014-2015 <a href="http://id.linkedin.com/in/felixprawira">Felix Prawira</a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
          "order": [[ 0, "desc" ]]
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
