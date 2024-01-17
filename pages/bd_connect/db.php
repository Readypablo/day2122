
<?php 

// подключение бд
$host= 'localhost';
 $user = 'root';
 $password = '';
 $db_name = 'day13';
 $con = mysqli_connect($host, $user, $password, $db_name);

if(mysqli_connect_errno()){
    echo "failed".mysqli_connect_errno();
}


 ?>