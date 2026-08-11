<?php
include("connect.php");
?>
<?php
$delete=$_GET['id'];
$sql="DELETE FROM user where  id=$delete";
 $res=mysqli_query($conn,$sql);
 if($res){
    echo"Data deleted successfully";
    header("Location: index.php");
    }else{
        echo"Error deleting data: ".mysqli_error($conn);
    }   
?>