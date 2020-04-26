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

if(isset($_POST['submit'])){
   $username = $_POST['username']; 
 $username = mysqli_real_escape_string($mysqli, $username);
 $password = $_POST['password'];
 $password = mysqli_real_escape_string($mysqli, $password); 
 $cpass = $_POST['confirm_password'];
 $cpass = mysqli_real_escape_string($mysqli, $cpass);
 $name = $_POST['name1'];   
 $course = $_POST['course'];
 $address=$_POST['address'];
 $state=$_POST['state'];
 $doj=$_POST['doj'];
 $dob=$_POST['dob'];
 $father=$_POST['father'];
 $mother=$_POST['mother'];
 $contact=$_POST['contact']; 

$input = array('Almora','Bageshwar','Tehri Garhwal','Chamba','Chamoli','Champawat','Dehradun','Haridwar','Nainital','Pauri Garhwal','Pithoragarh','Rudraprayag','Udham Singh Nagar','Uttarkashi','Mussurie');       
  $rand_keys = array_rand($input, 2);
  $yup=$input[$rand_keys[0]];

 if(isset($_POST['bond']))
    $bond = "Yes";
 else
    $bond = "No";
      
    if($password!=$cpass)
    {
      echo '<div class="alert alert-danger alert-dismissible fade in" style="text-align:center">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>ERROR!</strong> Passwords do not match!
          </div>';
    }
    else{
      $sql = "INSERT INTO `registeration` (`student_name`,`course`,`doj`, `bond`,`remaining`, `username`, `password`,`address`,`state`,`place`,`father`,`mother`,`contact`,`dob`) VALUES ('$name', '$course','$doj', '$bond',DATE_ADD(doj,INTERVAL 12 MONTH),'$username', '$password','$address','$state','$yup','$father','$mother','$contact','$dob')";
      
      if($mysqli->query($sql)){
        echo "<script>window.location.href='sign.php';</script>";
      }
      elseif(($mysqli->error) == "Duplicate entry '$username' for key 'PRIMARY'"){
        echo '<div class="alert alert-danger alert-dismissible fade in" style="text-align:center">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>ERROR!</strong> Username already taken!
          </div>';
      }
      else{
        echo "Error....".$mysqli->error;
      }
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
        <a href="contact.php" class="nav-link">Contact</a>
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
           alt="BIMS"
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
          <a href="#" class="d-block" style="color:white;"><?php echo"".$name?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas "></i>
              </p>
            </a>  
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Inforamtion
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="table1.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students Information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bond.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bond Information</p>
                </a>
              </li>
            </ul>
             <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Student Posting Details
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="posting.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bond Postings</p>
                </a>
              </li>
            </ul>
            <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Registrations
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sign.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
           <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="delete.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delete User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Feedbacks
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="inbox.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="compose.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>compose</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Changes Required
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="changeinbox.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="changesrequired.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Changes</p>
                </a>
              </li>
            </ul>
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
            <h1><b>Registration</b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Registrations</li>
              <li class="breadcrumb-item active">Add User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>B I M S</b> </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="sign.php" method="post" >
                <div class="card-body">
                    <div class="form-group">
                      <label for="name">Full Name</label>
                      <input name="name1" type="text" class="form-control" placeholder="Full Name" style="width: 50%;">
                    </div>
                    <div class="form-group">
                  <label>Course:  </label>
                    <select class="form-control select2" name="course" style="width: 50%;" >
                          <option disabled selected value> -- select an option -- </option>
                          <option>MBBS</option>
                          <option>MD (Doctor of Medicine)</option>
                          <option>MS (Master of Surgery)</option>
                          <option>DIPLOMA</option>
                        </select>
                </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control select2" name="gender" style="width: 50%;">
                          <option disabled selected value> -- select an option -- </option>
                          <option>Male</option>
                          <option>Female</option>
                          <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="doj">Starting Date of Bond:</label>
                      <input type="date" id="doj" name="doj"  >
                    </div>
                    <div class="form-group">
                      <label for="email">Bond:</label>
                      <input name="bond" type="checkbox" id="bond">
                    </div>
                  <div class="form-group">
                      <label for="name">Father's Name</label>
                      <input name="father" type="text" class="form-control" placeholder="Father's Name" style="width: 50%;">
                    </div>
                    <div class="form-group">
                      <label for="name">Mother's Name</label>
                      <input name="mother" type="text" class="form-control" placeholder="Mother's Name" style="width: 50%;">
                    </div>
                    <div class="form-group">
                      <label for="name">Contact</label>
                      <input type="tel"  class="form-control" name="contact"  placeholder="Contact" style="width: 50%;">
                    </div>
                      <div class="form-group">
                      <label for="dob">Date of Birth: </label>
                      <input type="date" id="dob" name="dob"  >
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="username" class="form-control" id="exampleInputEmail1" placeholder="Email" style="width: 50%;">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style="width: 50%;">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Confirm Password:</label>
                    <input name="confirm_password" type="password" class="form-control"  id="pwd2" placeholder="Confirm Password" style="width: 50%;">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" style="width: 50%;">
                  </div>
                  <div class="autocomplete"><label for="state">State:</label><br>
                    <input id="myInput" type="text" name="state" placeholder=" State" style="width: 50%;">
                  </div>
                  <br>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
      name1: {
        required: true,
        minlength:3
      },
      course: {
        required: true,
      },
      gender: {
        required: true,
      },
      doj: {
        required: true,
      },
      bond_type: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      address: {
        required: true,
      },
      state: {
        required: true,
      },
      district: {
        required: true,
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
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
});
</script>
</body>
</html>
