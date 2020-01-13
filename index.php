<?php 
	session_start();
	include_once("config.php"); 
	if(!isset($_SESSION['username'])){
   header("Location:login.php");
   }
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>BIMS</title> 
              <link rel="shortcut icon" href ="your_logo_2_.ico"  type="image/x-icon"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
		<li><a href="table.php">Information</a></li>
        <li><a href="about.html">About</a></li>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
		<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">   

<h1>Welcome to the Bond Information website.</h1>
<br></br>
<h2> Please click on the "Information" tab to check the details of students. And click on the "About" Tab to check the details of website.</h2>




</div>


<br><br>

<footer class="container-fluid text-center">
  <p style="color:5CDB95">Major Project B.Tech</p>
</footer>

</body>
</html>
