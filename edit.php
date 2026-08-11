<?php
session_start();
IF(!empty($_SESSION['ISUSERLOPGGING'])){
}
?>
<?php
include("connect.php");

?>
<?php
$result=$_GET['id'];
$sql="SELECT * FROM user where id=$result";
$res=mysqli_query($conn,$sql);
$fetch=mysqli_fetch_assoc($res);

if(!empty($_POST)){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $update="UPDATE user SET
    username='$username',
    email='$email',
    password='$password'
    WHERE id=$result";
    $res=mysqli_query($conn,$update);
     
    $sql=mysqli_query($conn,$update);
    if($sql){
        echo"Data updated successfully";
        header("Location: index.php");

}else{
    echo"Error updating data: ".mysqli_error($conn);
}
}
?>
<form method="POST">
    username:<input type="text" name="username" value="<?=$fetch['username']?>"><br><br>
    email:<input type="email" name="email" value="<?=$fetch['email']?>"><br><br>
    password:<input type="password" name="password" value="<?=$fetch['password']?>"><br><br>
    <BUTTON type="submit" name="submit">Update</BUTTON>
    </form>