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
      <!-- <div class="nav notify-row" id="top_menu"></div> -->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="<?php bloginfo( 'url' ) ?>/wp-admin">Back to WordPress Dashboard</a></li>
          <li><a class="logout" href="login.html">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- ****************** MAIN SIDEBAR MENU ******************-->
    <!--sidebar start-->
  
<?php 
if($_GET['page'] == 'all_students' || $_GET['page'] == 'add_student')$student_active = true;
if($_GET['page'] == 'all_department' || $_GET['page'] == 'add_department')$department_active = true;
if($_GET['page'] == 'all_semester' || $_GET['page'] == 'add_semester')$semester_active = true;
if($_GET['page'] == 'varsity-management') $dashboard_active = true;
?>
  

    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="<?php echo admin_url( 'admin.php?page=varsity-management' ); ?>"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/sc-logo.png" class="img-circle" width="80"></a></p>
          <h5 class="centered">Sam Soffes</h5>
          <li class="mt">
            <a class="<?php echo $dashboard_active ? 'active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=varsity-management' ) ?>">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="<?php echo $student_active ? 'active': '' ?>" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Students</span>
              </a>
            <ul class="sub">
              <li class="<?php echo $_GET['page'] == 'all_students' ? 'active': '' ?>"><a href="<?php echo admin_url( 'admin.php?page=all_students' ) ?>">All Students</a></li>
              <li class="<?php echo $_GET['page'] == 'add_student' ? 'active': '' ?>"><a href="<?php echo admin_url( 'admin.php?page=add_student' ) ?>">Add Student</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a class="<?php echo $department_active ? 'active' : ''; ?>" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Department</span>
              </a>
            <ul class="sub">
              <li class="<?php echo $_GET['page'] == 'all_department' ? 'active' : ''; ?>"><a href="<?php echo admin_url( 'admin.php?page=all_department' ) ?>">All Departments</a></li>
              <li class="<?php echo $_GET['page'] == 'add_department' ? 'active' : ''; ?>"><a href="<?php echo admin_url( 'admin.php?page=add_department' ) ?>">Add Department</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="<?php echo $semester_active ? 'active' : ''; ?>" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Semester</span>
              </a>
            <ul class="sub">
              <li class="<?php echo $_GET['page'] == 'all_semester' ? 'active' : ''; ?>"><a href="<?php echo admin_url( 'admin.php?page=all_semester' ) ?>">All Semester</a></li>
              <li class="<?php echo $_GET['page'] == 'add_semester' ? 'active' : ''; ?>"><a href="<?php echo admin_url( 'admin.php?page=add_semester' ) ?>">Add Semester</a></li>
            </ul>
          </li>
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>

    <!--sidebar end-->
    <!-- *********** MAIN CONTENT ****************-->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">