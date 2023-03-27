<?php
include 'connect.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <div class="container" style="text-align:center">
    <button class="btn btn-primary my-5"><a href="index.php" class="text-light">Add comment</a></button>
    <button class="btn btn-primary my-5"><a href="add.php" class="text-light">Add category</a></button>
<table class="table">
  <thead class="thead-dark">
   
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Category</th>
    </tr>
  </thead>
  <tbody>
 <?php 
//  $sql1= "SELECT *
// FROM ((comments
// INNER JOIN comments ON comments.category_id = category.cat)";
$sql = "SELECT *
FROM category
LEFT JOIN comments
ON comments.category_id=category.id

   ORDER BY comments.name";
    $result=mysqli_query($conn,$sql);
    

 //Count the rows
 if($result->num_rows !=0){
   while($rows = $result->fetch_assoc()){
    $category = $rows['cat_name'];
    $phone = $rows['phone'];
?>
   
<tr>


        <td><?php echo $rows['id'] ?></th>
        <td><?php echo $rows['name'] ?></th>
        <td><?php echo $phone ?></th>
        <td><?php echo $category ?></td>
        
            </tr>
      </div>
      
    </div>
  </div>
</div>
</td>
<?php }}?>

        </tr>
</body>
</html>