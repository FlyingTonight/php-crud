<?php
session_start();
include 'connect.php';
$id=$_GET['updateid'];
$sql="Select * from category where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['cat_name'];
if(isset($_POST['submit'])){
    $name=$_POST['cat_name'];
    
    $sql="update category set id= '$id', name= '$name'
    where id=$id"; 
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['updated'] = "Data updated Succesfuly";
    //    echo "Updated successfully";
      header('location:categ.php');
    }else{
        die(mysqli_error($conn));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <title>Update Categories</title>
    
</head>
<body>
    <div style="text-align:center">
     <button class="btn btn-primary my-5"><a href="display.php" class="text-light">Back to comments</a></button> </div>
    <div class="container ">
    <form method="post">
  <div class="form-group -10">
    <label for="exampleInputEmail1">Category</label>
    <input type="text" class="form-control" value=<?php echo $name?> name="cat_name" placeholder="Enter your name">
    
<div class="d-flex" style="justify-content:center">

    <button style="justify-content:center" type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>
</form>
</body>
</html>