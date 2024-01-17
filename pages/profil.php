<?php include("header.php");
require('bd_connect/db.php');
include("bd_connect/auth_session.php");

// if($_SESSION['user_name_last'] == 'admin'){
//         header('Refresh:40',session_destroy());
//     }










$sql3 = "SELECT workout.id,workout.first_namee,first_name,img,cost,workout.data FROM workout inner join books on workout.lek_id = books.id";
$result = $con->query($sql3);


for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row)
{

}
$i=0;



$cost=0;
             

// ini_set('session_gc_maxlifetime', 1);





?>



<div class="form">
<h2 >профиль</h2>
      Имя:<?php echo   $_SESSION['user_name_us']; ?> <br>
      Фамилия:<?php echo   $_SESSION['user_name_last']; ?><br>
      Баланс:<?php echo   $_SESSION['balenc']; ?>$<br>
      <form method="post"><input type="submit" value="пополнить баланс" class="btn-del" name='bal'></form>
    <a href="bd_connect/logout.php">Выход</a>
</div>

<?php 


if(isset($_POST["bal"])){
$zzz=$_SESSION['user_name_us'];
$newbal = $_SESSION['balenc']+100;
$_SESSION['balenc'] = $newbal ;
    $sqlu="UPDATE users SET balenc='$newbal' WHERE first_name = '$zzz' ";
    mysqli_query($con , $sqlu) or die ;

}
?>



<div class="popular-row">
<?php foreach($data as $elem)  {

if($_SESSION['user_name_us'] == $elem['first_namee']){

$id= $elem['id'];
echo '
<div class="popular-card">
<img src="../img/'.$elem['img'].'" alt="" class="imgbooks">
        <h2>'.$elem['first_name'].'</h2>
        <h2>цена: '.$elem['cost'].'$</h2>
        <h2>дата: '.$elem['data'].'</h2>';
        echo ' <form method="post"><input type="submit" value="Удалить" class="btn-del" name='.$id.'></form>';
        if(isset($_POST["$id"])){
        $query="DELETE FROM `workout` WHERE id=$id";
        mysqli_query($con , $query) or die ;
        }
    
  
        echo ' </div>';  }
} ?>

</div>


<?php 

if($_SESSION['user_name_last'] == 'admin'){
echo '
<a href="red.php" class="login-button">Изменить</a>
</form>
';



             
}


if($_SESSION['user_name_last'] == 'manager'){
        echo '
        <a href="manager.php" class="login-button">Окно мэнеджера</a>
        </form>
        '; 
        }




        




?>



<?php 
if($_SESSION['user_name_last'] == 'admin'){
      
        
        
        
                     
     

if(isset($_REQUEST['first_name'])){
    // имя
    $first_name = stripcslashes($_REQUEST['first_name']);
    $first_name = mysqli_real_escape_string($con,$first_name);
    // фамилия
    $last_name = stripcslashes($_REQUEST['last_name']);
    $last_name = mysqli_real_escape_string($con,$last_name);

    $email = stripslashes($_REQUEST['email']);    
    $email = mysqli_real_escape_string($con,$email);

    // мобильный
    $mobile = stripcslashes($_REQUEST['mobile']);
    $mobile = mysqli_real_escape_string($con,$mobile);

    // дата
    $birthday = stripcslashes($_REQUEST['birthday']);
    $birthday = mysqli_real_escape_string($con,$birthday);

    // пароль
    $password = stripcslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);

  

    $query = "INSERT into `users` (first_name, last_name, phone, email,data,password)
     VALUES ('$first_name', '$last_name', '$mobile', '$email', '$birthday' ,'$password')";



    $ult = mysqli_query($con, $query);

    // чекаем все поля все ли хорошо там
    if($ult){
        echo "      <div class='main-content'>
        <div class='main-info'><div class='form'>
        <h3>Регистрация прошла  спешно!</h3><br/>
        <p class='link'>Вход в профиль<a href='login.php'> вход</a></p>
        </div>  </div>
        </div>";
    }else{
        echo "      <div class='main-content'>
        <div class='main-info'><div class='form'>
        <h3>Вы заполнил не все поля .</h3><br/>
        <p class='link'>Попробуйте <a href='registration.php'>registration</a> Заного.</p>
        </div>  </div>
        </div>";
         }    
    
}else{
    ?>



<form action="" method="post" class="form_form">

<div class="form" method="post">

<h1 class="login-title">Добавление клиента</h1>
        <input type="text"  class="login-input" name="first_name" placeholder="имя" required />
        <input type="text" class="login-input" name="last_name" placeholder="фамилия" required>
        <input type="text" class="login-input" name="email" placeholder="email" required>
       
        <input type="text" class="login-input"   name="mobile" placeholder="телефон" required>

        <input type="date" class="login-input" name="birthday" placeholder="Дата рождения" required>

        <input type="password" class="login-input" name="password" placeholder="Пароль" required>
        <input type="submit" name="submit" value="Регистрация" class="login-button">

</div>




</form> 
 <?php }   }?>




<?php  



if($_SESSION['user_name_last'] == 'admin'){
    echo '<div class="block-changes">
    <h2>Панель изменения заказа</h2>
    <form  method="post" id="form-changes">
    
    <h3 class="name-card">ID заказа</h3>
    <input type="text" class="inp-chang" name="id" required>
    
    <h3 class="name-card">пользователь</h3>
    <input type="text" class="inp-chang" name="name" required>
    
    <h3 class="name-card">товар</h3>
    <input type="text" class="inp-chang" name="cost" required>
    <h3 class="name-card">дата</h3>
    <input type="date" class="inp-chang" name="dataa" required>
    
    <input type="submit" value="изменить" class="btn-chang" name="send">
    </form>
    </div>';
    
    
    
    if(isset($_POST['send'])) {
            $sql2 = 'SELECT * from workout ';
          
            $name = stripslashes($_REQUEST['name']);    
            $name = mysqli_real_escape_string($con, $name);
            
            $cost = stripslashes($_REQUEST['cost']);    
            $cost = mysqli_real_escape_string($con, $cost);
    
            $dataa = stripslashes($_REQUEST['dataa']);    
            $dataa = mysqli_real_escape_string($con, $dataa);
    
            $id = stripslashes($_REQUEST['id']);    
            $id = mysqli_real_escape_string($con, $id);
          
   
           
          
     
            
          
                $query = "UPDATE workout SET first_namee='$name', lek_id='$cost',data='$dataa' WHERE id='$id'";
          
                $ult = mysqli_query($con, $query);
          
                // чекаем все поля все ли хорошо там
          
                if($ult){
                    echo "<div class='form'>
                    <h3>изменили товар</h3><br/>
                    </div>";
                }else{
                    echo "<div class='form'>
                    <h3>Ты где то напакостил</h3><br/>
                    </div>";
                     }    
          
         
           
          
          
          }
    }if($_SESSION['user_name_last'] == 'admin'){
    ?>


<form method="POST" >
     
     <table border="1">
     
     <th>id</th>
     <th>полшьзователь </th>
     <th>товар</th>
     <th>дата</th>
   
     <th>удалить</th>
     <?php 
        
         $query= "SELECT * FROM `workout` ";
         $result = mysqli_query($con, $query) or die;
         
         for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row)
         $i++;
         ;
         foreach($data as $elem){
             echo "<tr>";
             echo "<td>".$elem['id']."</td>";
             echo "<td>".$elem['first_namee']."</td>";
             echo "<td>".$elem['lek_id']."</td>";
             echo "<td>".$elem['data']."</td>";
             $idk = $elem['id'];
             echo '<td><form method="post"><input type="submit" value="отказаться" name='.$idk.'>     </form></td>';
             if(isset($_POST["$idk"])){
                $query="DELETE FROM `workout` WHERE id=$idk";
                    mysqli_query($con , $query) or die ;
             }
             echo "</tr>";
         }
         
     
        
     
     
     
     ?>
     
     
     
     </table></form>



     <?php  
     
     
     
     


    echo '<div class="block-changes">
    <h2>Панель добавления заказа</h2>
    <form  method="post" id="form-changes">
    
    <h3 class="name-card">ID заказа</h3>
    <input type="text" class="inp-chang" name="id" required>
    
    <h3 class="name-card">пользователь</h3>
    <input type="text" class="inp-chang" name="names" required>
    
    <h3 class="name-card">товар</h3>
    <input type="text" class="inp-chang" name="costs" required>
    <h3 class="name-card">дата</h3>
    <input type="date" class="inp-chang" name="dataaa" required>
    
    <input type="submit" value="Добавить" class="btn-chang" name="sendd">
    </form>
    </div>';
  if(isset($_POST['sendd'])) {
    $sql2 = 'SELECT * from workout ';
  
    $names = stripslashes($_REQUEST['names']);    
    $names = mysqli_real_escape_string($con, $names);
    
    $costs = stripslashes($_REQUEST['costs']);    
    $costs = mysqli_real_escape_string($con, $costs);

    $dataaa = stripslashes($_REQUEST['dataaa']);    
    $dataaa = mysqli_real_escape_string($con, $dataaa);

    $id = stripslashes($_REQUEST['id']);    
    $id = mysqli_real_escape_string($con, $id);
  
   
    
  
        $query = "INSERT into `workout` (first_namee,lek_id, data) VALUES ('$names', '$costs','$dataaa')";
  
        $ult = mysqli_query($con, $query);
  
        // чекаем все поля все ли хорошо там
  
        if($ult){
            echo "<div class='form'>
            <h3>Добавили товар</h3><br/>
            </div>";
        }else{
            echo "<div class='form'>
            <h3>Ты где то напакостил</h3><br/>
            </div>";
             }    
  
  
   
  
  
  }}


?>
     
     <script >
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}



</script>