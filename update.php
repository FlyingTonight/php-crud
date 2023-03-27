<?php
session_start();
include 'connect.php';
$id=$_GET['updateid'];
$sql="Select * from comments where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$phone=$row['phone'];
$comments=$row['comments'];
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $comments=$_POST['comments'];
    
    $sql="update comments set id= '$id', name= '$name', phone= '$phone', comments= '$comments'
    where id=$id"; 
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['updated'] = "Data updated Succesfuly";
    //    echo "Updated successfully";
      header('location:display.php');
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
 <title>Update Comments</title>
    
</head>
<body>
    <div style="text-align:center">
     <button class="btn btn-primary my-5"><a href="display.php" class="text-light">Back to comments</a></button> </div>
    <div class="container ">
    <form method="post">
  <div class="form-group -10">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" value=<?php echo $name?> name="name" placeholder="Enter your name">
    <label for="exampleInputEmail1">Phone number</label>
    <input type="text" class="form-control" name="phone"value=<?php echo $phone?> placeholder="Enter your phone number">
  <div class="form-group">
    <label for="exampleInputEmail1">Comments</label>
    <input type="text" class="form-control" value=<?php echo $comments?> name="comments" placeholder="Enter your comments">
</div>
<div class="d-flex" style="justify-content:center">

    <button style="justify-content:center" type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>
</form>
</body>
</html>