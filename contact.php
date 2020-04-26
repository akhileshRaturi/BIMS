<?php 
	session_start();
	include_once("config.php"); 
	if(!isset($_SESSION['username'])){
   header("Location:login.php");
   }

   $username = $_SESSION['username'];
$sql="Select * FROM `registeration` WHERE `username`='$username'";
$retval = $mysqli->query($sql);
if($retval){
  while($row=mysqli_fetch_assoc($retval)){
	$name=$row['student_name'];
			 }
}
$sql="Select * FROM `admin` WHERE `username`='$username'";
$retval = $mysqli->query($sql);
if($retval){
  while($row=mysqli_fetch_assoc($retval)){
    $name=$row['username'];
             }
}




?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BIMS </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">


 <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
	  <li class="nav-item">
		<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
	  </li>
	  <li class="nav-item d-none d-sm-inline-block">
		<a href="dashboard.php" class="nav-link">Home</a>
	  </li>
	  <li class="nav-item d-none d-sm-inline-block">
		<a href="contact.php" class="nav-link active">Contact</a>
	  </li>

	  <li class="nav-item d-none d-sm-inline-block">
		<a href="logout.php" class="nav-link">Logout</a></li>
	</ul>
	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
	  <!-- Messages Dropdown Menu -->
	</ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #000000;">
	<!-- Brand Logo -->
	<a href="dashboard.php" class="brand-link">
	  <img src="your-logo-3-.png"
		   alt="AdminLTE Logo"
		   class="brand-image img-circle elevation-3"
		   style="opacity: 1.5">
	  <span class="brand-text font-weight">B I M S</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
	  <!-- Sidebar user (optional) -->
	 <div class="user-panel mt-3 pb-3 mb-3 d-flex">
	   <div class="image">
		  <img src="dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
		</div>
		<div class="info">
		  <a  class="d-block" style="color:white;"><?php echo"".$name?></a>
		</div>
	  </div>

	  <!-- Sidebar Menu -->
	  <nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		  <!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
		   <li class="nav-item has-treeview">
			<a href="dashboard.php" class="nav-link">
			  <i class="nav-icon fas fa-home"></i>
			  <p>
				Home
				<i class="right fas "></i>
			  </p>
			</a>  
		  </li>
		   <li class="nav-item has-treeview">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fa fa-power-off"></i>
                <p>
                  Logout
                  <i class="right fas "></i>
                </p>
              </a>  
            </li>
		</ul>
	  </nav>
	</div>
	<!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1><b>Contact</b></h1>
		  </div>
		  <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
			  <li class="breadcrumb-item active">Contact</li>
			</ol>
		  </div>
		</div>
	  </div><!-- /.container-fluid -->
	</section>

 <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Mentor
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Dr.Ankur Dumka</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Professor at GEU </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Clement Town</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: +91-8218697450</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="dist/img/avatar5.png" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Project Member
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Akhilesh Raturi</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / Student at GEU</p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Bhauwala, Dehradun</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: +91-9536989306</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="ankit.jpeg" alt="Akhilesh"  class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Project Member
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Akriti Agrawal</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / Student at GEU </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Panditwari, Dehradun</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: +91-9149100029</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="akriti.jpg" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            
            
            
            
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
	<strong>Major Project &copy; 2020.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
	submitHandler: function () {
	  alert( "Form successful submitted!" );
	}
  });
  $('#quickForm').validate({
	rules: {
	  student_roll: {
		required: true,
	  }
	}
  });
  errorPlacement: function (error, element) {
	  error.addClass('invalid-feedback');
	  element.closest('.form-group').append(error);
	},
	highlight: function (element, errorClass, validClass) {
	  $(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
	  $(element).removeClass('is-invalid');
	}
  });
</script>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}
</script>
</body>
</html>
