<?php 
include_once("config.php");
session_start();
if(isset($_SESSION['username'])){
   header("Location:dashboard.php");
}

if(isset($_POST['commit'])){
		$username = $_POST['username'];
		$username = mysqli_real_escape_string($mysqli, $username);
		$password = $_POST['password'];
		$password = mysqli_real_escape_string($mysqli, $password);
    $usertype= $_POST['usertype'];
		$sql = "SELECT * FROM `registeration` WHERE `username`='$username' and `password`='$password' and `usertype`='$usertype' ";
    $seeql = "SELECT * FROM `admin` WHERE `username`='$username' and `password`='$password' and `usertype`='$usertype' ";
		if($usertype=="Admin")
    {
    $result = $mysqli->query($seeql);
		  if($result->num_rows > 0){
			 $_SESSION['username'] = $username;
			 $_SESSION['password'] = $password;
       header("Location:dashboard.php");                   //yha pr dashboard.php hai
		  }
    }
     if ($usertype=="user")  {
      $result = $mysqli->query($sql);
      if($result->num_rows > 0){
       $_SESSION['username'] = $username;
       $_SESSION['password'] = $password;
       header("Location:user/userdash.php");                   //yha pr dashboard.php hai
      }
    }
  }

  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment= $_POST['comment'];
    $sql = "INSERT INTO `comment` (`name`,`email`,`comment`) VALUES ('$name','$email','$comment')";
    if($mysqli->query($sql)){
        echo "data inserted successfully...";
        echo "<script>window.location.href='login.php';</script>";
      }
      else
      {
        echo "Error....".$mysqli->error;
      }
    }
		
$quer = "UPDATE counter SET visits = visits+1 WHERE id = 1";
    $we=$mysqli->query($quer);

    

?>
<html>
<head>
    <title>BIMS</title> 
              <link rel="shortcut icon" href ="your_logo_56_.ico"  type="image/x-icon"> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>



<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" style="background:#f2f2f2;">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
       <li data-target="#myCarousel" data-slide-to="2"></li>

</ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="bond.png" alt="BIMS">
    </div>

    <div class="item">
      <img src="(1).JPG" alt="BIMS">
    </div>
    <div class="item">
      <img src="(2).JPG" alt="BIMS">
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>










<nav class="navbar navbar-inverse navbar-fixed"  style="background-color: #000000;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>

	<a class="navbar-brand" href="login.php">      
	<div class="logo-image">
            <img src="your-logo-3-.png" class="img-fluid">
      </div>
</a>

    
</div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="login.php">HOME</a></li>        
	      <li><a href="#contact">CONTACT</a></li>      
	</ul>
    </div>
  </div>
</nav>

<div id="home" class="container text-center">
<b><h3>BIMS</h3></b>
  <p><b>Bond Information Management System</b></p>
<br>
<br>
</div>
<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 " >   
	<form action="login.php" method="post">

	  <div class="form-group">
    <label for="email">User :</label>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <select class="form-control select2" name="usertype" blankRowText="----Select----" style="width: 100%;">
                          <option disabled selected value> -- select an option -- </option>
                          <option>Admin</option>
                          <option>user</option>
                        </select>
    </div>
    </div>
    <div class="form-group">
		<label for="email">Email :</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			<input type="text" name="username" class="form-control" id="email">
		</div>
	  </div>
	  <div class="form-group">
		<label for="pwd">Password:</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password" name="password" class="form-control" id="pwd">
		</div>
	  </div>
	  <button type="submit" class="btn btn-primary" name="commit">Log In</button>
	 </form>
</div>
</div>
</div>
</div>

<!--       this is picture section   -->


<br>
<br>
<br>
<br>
<div id="about" class="container text-center">
  <br>
  <br>
  <br>

  <p><b>It is a Bond Information Management website...</b></p>
  <br>
  <br>
  <br>
  <div class="row">
    <div class="col-sm-6">
      <p class="text-center"><strong>Akhilesh Raturi</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="ankit.jpeg" class="img-circle person" alt="Akhilesh Raturi" width="255" height="255">
      </a>
      <div id="demo" class="collapse">
       <br>        
       <p>Web Developer</p>
       <p>Team Member</p>
     </div>
   </div>
   <div class="col-sm-6">
    <p class="text-center"><strong>Akriti Agrawal</strong></p><br>
    <a href="#demo2" data-toggle="collapse">
      <img src="akriti.jpg" class="img-circle person" alt="Akriti Agrawal" width="255" height="255" >
    </a>
    <div id="demo2" class="collapse">
     <br>
     <p>Web Developer</p>
     <p>Team Member</p>
   </div>
 </div>
</div>
</div>



<!-- ends picture section -->


<!-- Container (Contact Section) -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="bg-1">
<div id="contact" class="container">  
<h3 class="text-center"  style="color: white;">Contact</h3>
  <div class="row">
    <div class="col-md-4">
      <p><span class="glyphicon glyphicon-map-marker"></span> Uttarakhand, India</p>
      <p><span class="glyphicon glyphicon-phone"></span> Phone:+91-9536989306, +91-9149100029</p>
      <p><span class="glyphicon glyphicon-envelope"></span> Email: ankitraturi44@gmail.com, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;akriti.riya@gmail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
<form action="login.php" method="post">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comment" placeholder="Query" type="text" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit" name="submit">Send</button>
        </div>
      </div>
    </div>
</form>  
</div>
</div>
</div>
<!-- contact section ends here -->
<br>
<br>
<footer class="text-center">
  <p>Major Project &copy; 2020</p>
</footer>

<!-- javascript -->


<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
} 
</script>










</body>
</html>
