
<?php 
// session_start();
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid']; 

    $sql="delete from category where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        // $_SESSION['delete'] = "Data Deleted Succesfuly";
       // echo "successfully";
    //    header('location:display.php');
       include_once 'categ.php';
    }else{
        die(mysqli_error($conn));
    }
}
?>