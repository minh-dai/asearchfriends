<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'search_friends';
 
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die ("Connect database error");
mysqli_query($conn,"SET NAMES 'UTF8'");
