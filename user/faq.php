<?php 
session_start();
include_once("../config.php"); 
if(!isset($_SESSION['username'])){
 header("Location:../login.php");
}
$username = $_SESSION['username'];
$sql="Select * FROM `registeration` WHERE `username`='$username'";
$retval = $mysqli->query($sql);
if($retval){
  while($row=mysqli_fetch_assoc($retval)){
    $name=$row['student_name'];
    $roll=$row['student_roll'];
    $course=$row['course'];
    $email=$row['username'];
    $address=$row['address'];
    $state=$row['State'];
    $district=$row['district'];
    $place=$row['place'];
    $end_date=$row['remaining'];
    $start_date=$row['doj'];
     

     $fromDate = strtotime($start_date);
$currentDate = time();
$toDate = strtotime($end_date);



//days between From and To
$datediffA = round(($toDate- $fromDate) / (60 * 60 * 24));
//days between From and Current
$datediffB =  round(($currentDate- $fromDate) / (60 * 60 * 24));
$percentage = round(($datediffB*100)/$datediffA,2);
  }
}

if(isset($_POST['submit'])){
 $name = $_POST['name'];
 $email = $_POST['email'];   
 $contact = $_POST['contact'];
 $father = $_POST['fathername'];
 $mother = $_POST['mothername'];
 $address=$_POST['address'];
 $roll=$_POST['roll'];
 
 $sql = "INSERT INTO `updates` (`roll`,`name`, `email`, `contact`,`father`,`mother`,`address`) VALUES ('$roll','$name','$email','$contact','$father','$mother','$address')";

 if($mysqli->query($sql)){
  echo "<script>window.location.href='userdash.php';</script>";
}
else{
  echo "Error....".$mysqli->error;
}
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment= $_POST['comment'];
    $sql = "INSERT INTO `changeprofile` (`name`,`email`,`comment`) VALUES ('$name','$email','Changes Required in profile by $roll')";
    if($mysqli->query($sql)){
        echo "<script>window.location.href='login.php';</script>";
      }
      else
      {
        echo "Error....".$mysqli->error;
      }
    }





?>

  





<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BIMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../userdash.php" class="nav-link active">Home</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
          <a href="../logout.php" class="nav-link">Logout</a></li>
        </ul>



        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #000000;">
        <!-- Brand Logo -->
        <a href="../userdash.php" class="brand-link">
          <img src="../your-logo-3-.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: 1.5">
          <span class="brand-text font-weight">B I M S</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block" style="color:white;"><?php echo"".$name?></a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview">
            <a href="userdash.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas "></i>
              </p>
            </a>  
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Inforamtion
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="changeinfo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="userbond.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bond Information</p>
                </a>
              </li>
            </ul>
            <li class="nav-item has-treeview">
              <a href="userdash.php" class="nav-link active">
                <i class="nav-icon fas fa-question-circle"></i>
                <p>
                  FAQ
                  <i class="right fas "></i>
                </p>
              </a>  
            </li>
            <li class="nav-item has-treeview">
              <a href="../logout.php" class="nav-link">
                <i class="nav-icon fa fa-power-off"></i>
                <p>
                  Logout
                  <i class="right fas "></i>
                </p>
              </a>  
            </li>
          </ul>
        </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark"><b>FAQ</b></h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="userdash.php">Home</a></li>
        <li class="breadcrumb-item active">FAQ</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

<div><p style="font-size: 20px; align-content: center;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What is BIMS?</b><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
BIMS is an Bond information System, It allows the students to keep a eye on their progress throughout the year.</p>
<br>
<p style="font-size: 20px; align-content: center;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What is Bond Structre of MBBS?</b><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bond structure for the Course MBBS will be available soon.</p>
</div>
            <!-- Main content -->
 

    <!-- /.content -->

  

</div>
      <!-- footer -->

      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Major Project &copy; 2020.</strong>
      </footer>

      <script src="../plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
      <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="../plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../dist/js/adminlte.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes)-->
      <script src="../dist/js/pages/dashboard.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../plugins/chart.js/Chart.min.js"></script>
      <script src="../dist/js/demo.js"></script>
      <script src="../dist/js/pages/dashboard3.js"></script>
    </body>
    </html>
