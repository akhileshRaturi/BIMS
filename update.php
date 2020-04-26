<?php
session_start();
include_once 'config.php';





$sql="Select * FROM `updates`";
$retval = $mysqli->query($sql);
if($retval){
  while($row=mysqli_fetch_assoc($retval)){
    $cname=$row['name'];
    $cemail=$row['email'];
    $caddress=$row['address'];
    $cfather=$row['father'];
    $cmother=$row['mother'];
    $ccontact=$row['contact'];
    $rollno=$row['roll'];
             
                }
}

$sql="UPDATE `registeration` SET `student_name`='$cname',`username`='$cemail',`address`='$caddress',`father`='$cfather',`mother`='$cmother',`contact`='$ccontact' WHERE `student_roll`='$rollno'";
$retval = $mysqli->query($sql);
if($retval){
  header("Location:changesrequired.php");  
}
 else {
    echo "Error updating record: ";
}

?>