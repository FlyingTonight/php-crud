<?php
if( empty(session_id()) && !headers_sent()){
    session_start();
}
// session_start();
include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Comments</title>
</head>
<body>
  <div class="container">

     <?php
    if(isset($_SESSION['delete'])){
        echo '<div class="alert alert-primary role="alert">'.$_SESSION["delete"].'.</div>' ;
        unset($_SESSION['delete']);
    }
    
    if(isset($_SESSION['added'])){
         echo '<div class="alert alert-danger role="alert">'.$_SESSION["added"].'.</div>' ;
        unset($_SESSION['added']);
    }
    
    if(isset($_SESSION['updated'])){
        echo '<div class="alert alert-success role="alert">'.$_SESSION["updated"].'.</div>' ;
        unset($_SESSION['updated']);
    }
   ?>
   </div>
  


    <div class="container" style="text-align:center">
    <button class="btn btn-primary my-5"><a href="index.php" class="text-light" style="text-decoration:none;">Add comment</a></button>
    <button class="btn btn-primary my-5"><a href="add.php" class="text-light" style="text-decoration:none;">Add category</a></button>
<table class="table">
  <thead class="thead-dark">
   
    <tr>
      <th scope="col">ID</th> 
      <th scope="col">Name</th>
      <th scope="col">Phone number</th>
      <th scope="col">Comments</th>
      <th scope="col">Category</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
 <?php 
     
    // $sql= "Select * from comments";
//     $sql = "SELECT *
// FROM comments
// LEFT JOIN category
// ON comments.category_id=category.id
$sql = "SELECT *
FROM category
LEFT JOIN comments
ON comments.category_id=category.id";
    $result=mysqli_query($conn,$sql);
    if($result){
      while($row=mysqli_fetch_assoc($result)){
          $id=$row['id'];
          $name=$row['name'];
          $phone=$row['phone'];
          $comments=$row['comments'];
          $category=$row['cat_name'];
          echo '<tr>
          <th scope="row">'.$id.'</th>
          <td >'.$name.'</td>
          <td>'.$phone.'</td>
          <td>'.$comments.'</td>
          <td>'.$category.'</td>
          <td>
          
  
          
    <button class="btn btn-primary"><a href="update.php?  updateid='.$id.'" class="text-light" style="text-decoration:none;">Update</a></button>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Delete
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Are you Sure to Delete?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
      <a href="delete.php? deleteid='.$id.'" class="btn btn-danger" >Delete it</a>
      
              
      </div>
    </div>
  </div>
</div>
</td>

        </tr>';
 } }
    
    
    
    ?>
   

  </tbody>
</table>


              
      </div>
    </div>
  </div>
</div>
</td>

  
   

  </tbody>
</table>
 </div>
</body>
</html>