<?php 
  session_start();
  include_once("config.php"); 
 


   $input = array('Almora','Bageshwar','Tehri Garhwal','Chamba','Chamoli','Champawat','Dehradun','Haridwar','Nainital','Pauri Garhwal','Pithoragarh','Rudraprayag','Udham Singh Nagar','Uttarkashi','Mussurie');       
  $rand_keys = array_rand($input, 2);
  $yup=$input[$rand_keys[0]];

  $sql = "INSERT INTO `registeration` (`place`) VALUES ('$yup')";
      

      if($mysqli->query($sql)){
        echo "Done";
      }
      else{
        echo "Error....".$mysqli->error;
      }
      ?>