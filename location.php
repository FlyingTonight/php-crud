<?php
$conn=new mysqli('localhost', 'root', 'root', 'us_locations');
if(!$conn){
    die(mysqli_error($conn));
}else{
    // echo "Succesfull";
}
$sql = "SELECT * from citys 
left join comments on comments.city = citys.city 
where citys";
 $result=mysqli_query($conn,$sql);
    if($result){
      while($row=mysqli_fetch_assoc($result)){
         
        echo "<br><br>";
        echo $row['name'];
        echo "<br>";
        echo $row['comment'];
    }}
   $sql =" SELECT comments.name, comments.category_id
FROM comments
LEFT JOIN category
ON coments.category_id=category.catid
ORDER BY category.name"
?>