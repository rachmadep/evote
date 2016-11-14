<header class="main-header">

        <!-- Logo -->
        <a href="admin.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>E</b>T</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Evote</b>Teknik</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/admin1.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php if ($_SESSION['level_user'] == 'admin') {
                    echo $_SESSION['name_user'].' and '.$_SESSION['name_user2'];
                  } else if ($_SESSION['level_user'] == 'superadmin') {
                    echo $_SESSION['name_user'];
                  } ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/admin1.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php if ($_SESSION['level_user'] == 'admin') {
                    echo $_SESSION['name_user'].' and '.$_SESSION['name_user2'];
                  } else if ($_SESSION['level_user'] == 'superadmin') {
                    echo $_SESSION['name_user'];
                  } ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="logout-admin.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>

        </nav>
      </header>