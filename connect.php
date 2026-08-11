<?php
$host="localhost";
$user="root";
$password="";

$conn=mysqli_connect($host,$user,$password);
  if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
  }
  else{
    echo "Connected successfully";
  }
  mysqli_select_db($conn, "crud");
  ?>