<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, , Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap  Template</title>

  <!-- Favicons -->
  <link href="<?php echo plugin_dir_url( __FILE__ ) ?>/img/favicon.png" rel="icon">
  <link href="<?php echo plugin_dir_url( __FILE__ ) ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url( __FILE__ ) ?>/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="<?php echo plugin_dir_url( __FILE__ ) ?>/css/style.css" rel="stylesheet">
  <link href="<?php echo plugin_dir_url( __FILE__ ) ?>/css/style-responsive.css" rel="stylesheet">
  <script src="<?php echo plugin_dir_url( __FILE__ ) ?>/lib/chart-master/Chart.js"></script>

</head>

<body>
  <section id="container">

    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>DASH<span>IO</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Dashio  Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="#">
                  <span class="photo"><img alt="avatar" src="<?php echo plugin_dir_url( __FILE__ ) ?>/img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              
              <li>
                <a href="index.html#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="<?php bloginfo( 'url' ) ?>/wp-admin">Back to WordPress Dashboard</a></li>
          <li><a class="logout" href="login.html">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Sam Soffes</h5>
          <li class="mt">
            <a class="active" href="#">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Students</span>
              </a>
            <ul class="sub">
              <li class=""><a href="<?php echo admin_url( 'admin.php?page=all_students' ) ?>">All Students</a></li>
              <li class=""><a href="<?php echo admin_url( 'admin.php?page=add_student' ) ?>">Add Student</a></li>
            </ul>
          </li>

          <li class="sub-menu active">
            <a class="" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Department</span>
              </a>
            <ul class="sub">
              <li class=""><a href="<?php echo admin_url( 'admin.php?page=all_department' ) ?>">All Departments</a></li>
              <li class=""><a href="<?php echo admin_url( 'admin.php?page=add_department' ) ?>">Add Department</a></li>
            </ul>
          </li>
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>