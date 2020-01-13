<?php 
	session_start();
	include_once("config.php"); 
	if(!isset($_SESSION['username'])){
   header("Location:login.php");
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

<div class="table-responsive">   
<table class="table table-striped">   
 <thead>
      <tr>
        <th>Name</th>
        <th>Roll Number</th>
		<th>Course</th>
		<th>Fees</th>
		<th>Bond</th>
      </tr>
    </thead>

    <tbody>
	<?php
	$sql = "SELECT * FROM registeration";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	echo 
	"<tr><td>" . $row["student_name"]. "</td><td>" . $row["student_roll"] . "</td><td>"
	. $row["course"]. "</td><td>" . $row["course_fee"] . "</td><td>" . $row["bond"] . "</td>
	<td>" ;
	}
	echo "</table>";
	} else { echo "0 results"; }
	?> 
    </tbody>
  </table>





</div>


<br><br>

<footer class="container-fluid text-center">
  <p style="color:5CDB95">Major Project B.tech</p>
</footer>

</body>
</html>
