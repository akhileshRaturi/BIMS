<?php
$hostName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'major_project';

$mysqli = new mysqli($hostName, $userName, $password, $databaseName);

if ($mysqli->connect_error){
    echo "Connection Error....<br>";
}
else{
    echo "";
}
?>