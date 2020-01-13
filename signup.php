<?php
include_once("config.php");
session_start();
if(isset($_POST['submit'])){
 $username = $_POST['username']; 
 $username = mysqli_real_escape_string($mysqli, $username);
 $password = $_POST['password'];
 $password = mysqli_real_escape_string($mysqli, $password);	
 $cpass = $_POST['confirm_password'];
 $cpass = mysqli_real_escape_string($mysqli, $cpass);
 $name = $_POST['name1'];  
 $roll = $_POST['roll']; 
 $course = $_POST['course']; 
 $fees = $_POST['fees']; 
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
			$sql = "INSERT INTO `registeration` (`student_name`, `student_roll`, `course`, `course_fee`, `bond`, `username`, `password`) VALUES ('$name', '$roll', '$course', '$fees', '$bond', '$username', '$password')";
			if($mysqli->query($sql)){
				echo "data inserted successfully...";
				echo "<script>window.location.href='index.php';</script>";
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
<html>
<head>
    <title>BIMS</title> 
              <link rel="shortcut icon" href ="your_logo_2_.ico"  type="image/x-icon"> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="icon" type="image/ico" href="favicon.ico" />
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1 style="color:5CDB95">Bond Information Management System</h1>      
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     	<a class="navbar-brand" href="your-logo-3-.png">
      <div class="logo-image">
            <img src="your-logo-3-.png" class="img-fluid">
      </div>
</a>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="about.html">About</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 " >    
	<form action="signup.php" method="post">
	<div class="form-group">
		<label for="name">Name:</label>
		<input name="name1" type="text" class="form-control" required>
	  </div>
	  <div class="form-group">
		<label for="email">University roll number:</label>
		<input name="roll" type="number" class="form-control" id="email" required>
	  </div>
	  <div class="form-group">
		<label for="email">Course:</label>
			<select class="form-control" name="course" required>
				<option>B.Tech</option>
				<option>BCA</option>
				<option>MBBS</option>
			</select>
	  </div>
	  <div class="form-group">
		<label for="email">Fees:</label>
		<input name="fees" type="number" class="form-control" id="email" required>
	  </div>
	  <div class="form-group">
		<label for="email">Bond:</label>
		<input name="bond" type="checkbox" id="email">
	  </div>
	  <div class="form-group">
		<label for="email">E-Mail:</label>
		<input name="username" type="email" class="form-control" id="email" required>
	  </div>
	  <div class="form-group">
		<label for="pwd">Password:</label>
		<input name="password" type="password" class="form-control" id="pwd" required>
	  </div>
	  <div class="form-group">
		<label for="pwd">Confirm Password:</label>
		<input name="confirm_password" type="password" class="form-control" id="pwd2" required>
	  </div>
	  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</form>
</div>
</div>
</div>
</div>
<script>
	var password = document.getElementById("pwd")
		 , confirm_password = document.getElementById("pwd2");

	function validatePassword(){
		 if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		  } else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>

<footer class="container-fluid text-center">
  <p style="color:5CDB95">Major Project B.tech</p>
</footer>

</body>
</html>
