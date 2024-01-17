<?php include("header.php") ;
require('bd_connect/db.php');
?>



<?php 

$sql2 = 'SELECT * from books';
   $result = $con->query($sql2);
   while ($row = $result->fetch_assoc()) {
       $id= $row['id'];
       echo '
       <div class="popular-card2">
       <img src="../img/'.$row['img'].'" alt="" class="imgbooks2">
            <h2>'.$row['first_name'].'</h2>
            <h2>цена: '. $row['cost'].'$</h2>
            <p>Подробнее: '. $row['info'].'$</p>';
           
           
             echo ' </div>';
   }
   ?>
