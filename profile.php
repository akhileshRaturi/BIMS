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
		$roll_no=$row['student_roll'];
		$course=$row['course'];
		$doj=$row['doj'];
		$bond=$row['bond'];
        $bond_type=$row['Bond_type'];
		$username=$row['username'];
		$state=$row['State'];
		$district=$row['district'];
        $remain=$row['remaining'];
             }
}

    //Get image data from database
    $result = $mysqli->query("SELECT `image` FROM `image` WHERE `username` = '$username'");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        //header("Content-type: image/jpg"); 
        echo '<img src="'.$imgData['image'].'" width="250">';
         
    }else{
        echo 'Image not found...';
    }  
   
 ?>

  



<html>
<head>
      <title>BIMS</title> 
              <link rel="shortcut icon" href ="your_logo_56_.ico"  type="image/x-icon"> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="icon" type="image/ico" href="favicon.ico" />
</head>
<body>

<div class="carousel-inner">
    <div class="item active">
      <img src="bond.png" alt="BIMS">
    </div>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      	<a class="navbar-brand" href="index.php">
      <div class="logo-image">
            <img src="your-logo-3-.png" class="img-fluid">
      </div>
</a>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">HOME</a></li>
        <li><a href="profile.php">PROFILE</a></li>
		<li><a href="table.php">INFORMATION</a></li>
        <li><a href="about.html">ABOUT</a></li>
        <li><a href="query.php">QUERY</a></li>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
		<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    

<a href="#demo" data-toggle="collapse">
        <img src="<?php echo $imgData['image']; ?>" class="img-circle person" alt="image not found" style="width:39%; height:25%;">
      </a>
                                    <h5>
                                        <b><?echo"".$name?></b>
                                    </h5>
                                 
                                    <p class="proile-rating">Bond Information Management System : </p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                   
                </div>

                <div class="row">

                    <div class="col-md-4">
        
                        <div class="profile-work">
                          
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>University Roll no.</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"".$roll_no ?></p>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"".$username ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Course</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"".$course ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>District</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"".$district ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>State</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"".$state ?></p>
                                            </div>
                                        <div class="col-md-6">
                                                <label>Bond</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"".$bond ?></p>
                                            </div>
                                        
                                        <div class="col-md-6">
                                                <label>Bond Type</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"".$bond_type ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of Joining</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"".$doj ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Bond Ending Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"".$remain ?></p>
                                            </div>
                                        </div>
                                        </div>

                                      </div>	
                            
                </div>
            </form>           
        </div>
    </div>




<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer class="text-center">
  <p>© Major Project 2019-2020</p>
</footer>

</body>
</html>

