<?php
session_start();
include 'connect.php';
if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $category_id=$_POST['category_id'];

    // $category = $_POST['category'];

    // $category=$_POST['category'];
    // if(!empty($_POST['category'])) {
    //     $selected = $_POST['category'];}
    $comments=$_POST['comments'];
    $sql="insert into comments(name,phone, comments, category_id)
    values('$name','$phone', '$comments','$category_id')";
    $result=mysqli_query($conn,$sql);
    if(isset($result)){
         $_SESSION['added'] = "Data Added Succesfuly";
       // echo "Succesfully";
         header('location:display.php');
    }else{ die(mysqli_error($conn));
       
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
 <title>Add a comment</title>
    
</head>
<body>
    <div style="text-align:center">
     <button class="btn btn-primary my-5"><a href="display.php" class="text-light">View comments</a></button>
     <button class="btn btn-primary my-5"><a href="categ.php" class="text-light">View categories</a></button> </div>
    <div class="container ">
    <form method="post">
  <div class="form-group -10">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
    <label for="exampleInputEmail1">Phone number</label>
    <input type="number" class="form-control" name="phone" placeholder="Enter your phone number" required>
  <div class="form-group"> 
<?php 
    $query ="SELECT * FROM category";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>
<label for="exampleInputEmail1">Please select category</label>
<select class="form-control" name="category_id">
  <?php 
  foreach ($options as $option) {
  ?>
    <option value="<?php echo $option['id'] ?>"><?php echo $option['cat_name']; ?> </option>
    <?php 
    }
   ?>
</select>
    <label for="exampleInputEmail1">Comments</label>
    <input type="text" class="form-control" name="comments" placeholder="Enter your comments" required>
</div>
<div class="d-flex" style="justify-content:center">

    <button style="justify-content:center" type="submit" class="btn btn-primary" name="submit">Submit</button>
  

  </div>
</form>
</body>
</html>