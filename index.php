<?php
session_start();
?>
<?php

include('connect.php');
?>
<?php
  // Creat Database
  $creat_db="CREATE DATABASE IF NOT EXISTS crud ";
  $sql=mysqli_query($conn,$creat_db);
   if(!$sql){
    die("Error creating database: ".mysqli_error($conn));
   }
   else{
    echo "Database created successfully";
   }

   // Create Table
   $creat_table="CREATE TABLE IF NOT EXISTS user(
   id INT AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(100) ,
   email VARCHAR(100) ,
   password VARCHAR(100)
   )";
   $sql=mysqli_query($conn,$creat_table);
   if(!$sql){
    die("Error creating table: ".mysqli_error($conn));
   }
   else{
    echo "Table created successfully";
   }
   //For inserting data into table
   $sql="SELECT * FROM user";

   $result=mysqli_query($conn,$sql);
   if(!empty($_POST)){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $insert="INSERT INTO user(username,email,password) VALUES('$username','$email','$password')";
   $result=mysqli_query($conn,$insert);
   if($result){
    echo"Data inserted successfully";
    header("Location: insert.php");
    
    }else{
        echo"Error inserting data: ".mysqli_error($conn);

    }}
 ?>
 <form method="POST">
username: <input type="text" name="username" required><br>
email: <input type="email" name="email" required><br>  
password: <input type="password" name="password" required><br>
<input type="submit" name="submit" value="Submit">  
    </form>
<ul>
<?php foreach($result as $detail){
  ?>

  <li>
    username: <?=$detail['username']?>
</li>
<li>
  email:<?=$detail['email']?>
</li>
<li>
  password:<?=$detail['password']?>
</li>
<li>
  <a href="edit.php?id=<?=$detail['id']?>">Edit</a>
  <a href="delete.php?id=<?=$detail['id']?>">Delete</a>
</li>
<hr>
<?php }?>
</ul>