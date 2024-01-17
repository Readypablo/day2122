


<?php 






include("header.php");
require('bd_connect/db.php');
include("bd_connect/auth_session.php");





if($_SESSION['user_name_last'] == 'admin'){
echo '<div class="block-changes">
<h2>Панель изменения товара</h2>
<form  method="post" id="form-changes">

<h3 class="name-card">ID товара</h3>
<input type="text" class="inp-chang" name="id" required>

<h3 class="name-card">Название товара</h3>
<input type="text" class="inp-chang" name="name" required>

<h3 class="name-card">цена</h3>
<input type="text" class="inp-chang" name="cost" required>
<h3 class="name-card">информация</h3>
<input type="text" class="inp-chang" name="infoo" required>

<h3 class="name-card">Имя файла изображения</h3>
<input type="text" class="inp-chang" name="silk" required>
<p class="ss">пример: 1.jpg , 2.png (файлые которые есть у вас)</p>

<input type="submit" value="изменить" class="btn-chang" name="send">
</form>
</div>';



if(isset($_POST['send'])) {
        $sql2 = 'SELECT * from books ';
      
        $name = stripslashes($_REQUEST['name']);    
        $name = mysqli_real_escape_string($con, $name);
        
        $cost = stripslashes($_REQUEST['cost']);    
        $cost = mysqli_real_escape_string($con, $cost);

        $infoo = stripslashes($_REQUEST['infoo']);    
        $infoo = mysqli_real_escape_string($con, $infoo);

        $id = stripslashes($_REQUEST['id']);    
        $id = mysqli_real_escape_string($con, $id);
      
        $silk = stripslashes($_REQUEST['silk']);
        $silk = mysqli_real_escape_string($con, $silk);
       
      
 
        
      
            $query = "UPDATE books SET first_name='$name', cost='$cost',img='$silk' WHERE id='$id'";
      
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
}
?>







<hr>


<form method="POST" >
     
     <table border="1">
     
     <th>id</th>
     <th>название </th>
     <th>картинка</th>
     <th>цена</th>
     <th>инфо</th>
     <th>удалить</th>
     <?php 
        
         $query= "SELECT * FROM `books` ";
         $result = mysqli_query($con, $query) or die;
         
         for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row)
         $i++;
         ;
         
         foreach($data as $elem){
         
             echo "<tr>";
             echo "<td>".$elem['id']."</td>";
             echo "<td>".$elem['first_name']."</td>";
             echo "<td>".$elem['img']."</td>";
             echo "<td>".$elem['cost']."</td>";
             echo "<td>".$elem['info']."</td>";
             $idk = $elem['id'];
             echo '<td><form method="post"><input type="submit" value="отказаться" name='.$idk.'>     </form></td>';
             if(isset($_POST["$idk"])){
                $query="DELETE FROM `books` WHERE id=$idk";
                    mysqli_query($con , $query) or die ;
             }
             echo "</tr>";
         }
         
     
        
     
     
     
     ?>
     
     
     
     </table></form>



<?php 




if($_SESSION['user_name_last'] == 'admin'){

    echo '<div class="block-changes">
    <h2>Панель добавления товара</h2>
    <form  method="post" id="form-changes">
    
    <h3 class="name-card">Название товара</h3>
    <input type="text" class="inp-chang" name="namee" required>
  
    <h3 class="name-card">цена</h3>
    <input type="text" class="inp-chang" name="costt" required>

    <h3 class="name-card">информация</h3>
    <input type="text" class="inp-chang" name="info" required>

    <h3 class="name-card">Имя файла изображения</h3>
    <input type="text" class="inp-chang" name="silkk" required>
    <p class="ss">пример: 1.jpg , 2.png (файлые которые есть у вас)</p>
    
    <input type="submit" value="Добавить" class="btn-chang" name="sendd">
    </form>
    </div>';
  if(isset($_POST['sendd'])) {
    $sql2 = 'SELECT * from books ';
  
    $name = stripslashes($_REQUEST['namee']);    
    $name = mysqli_real_escape_string($con, $name);
    $cost = stripslashes($_REQUEST['costt']);    
    $cost = mysqli_real_escape_string($con, $cost);
    $info = stripslashes($_REQUEST['info']);    
    $info = mysqli_real_escape_string($con, $info);
    $silk = stripslashes($_REQUEST['silkk']);
    $silk = mysqli_real_escape_string($con, $silk);
   
  
   
    
  
        $query = "INSERT into `books` (first_name,cost, img,info) VALUES ('$name', '$cost','$silk','$info')";
  
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
<hr>

<?php 

if($_SESSION['user_name_last'] == 'admin'){
    echo '<div class="block-changes">
    <h2>Панель изменения клиента</h2>
    <form  method="post" id="form-changes">
    
    <h3 class="name-card">ID менеджера </h3>
    <input type="text" class="inp-chang" name="id" required>
    <h3 class="name-card">имя</h3>
    <input type="text"  class="inp-chang" name="first_name" placeholder="имя" required />
    <h3 class="name-card">фамилия</h3>
    <input type="text" class="inp-chang" name="last_name" placeholder="фамилия" required>
    <h3 class="name-card">емайл</h3>
    <input type="text" class="inp-chang" name="email" placeholder="email" required>
    <h3 class="name-card">телефон</h3>
    <input type="text" class="inp-chang"   name="mobile" placeholder="телефон" required>
    <h3 class="name-card">рождение дата</h3>
    <input type="date" class="inp-chang" name="birthday" placeholder="Дата рождения" required>
    <h3 class="name-card">пароль</h3>
    <input type="password" class="inp-chang" name="password" placeholder="Пароль" required>
    <input type="submit" value="изменить" class="btn-chang" name="sendmen">
    </form>
    </div>';
    
    
    
    if(isset($_POST['sendmen'])) {
            $sql3 = 'SELECT * from users ';
          
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
        
            $id = stripslashes($_REQUEST['id']);    
            $id = mysqli_real_escape_string($con, $id);
            
          
                $queryk = "UPDATE users SET first_name='$first_name', last_name='$last_name',phone='$mobile', data='$birthday',password='$password' , email='$email' WHERE id='$id'";
          
                $ult = mysqli_query($con, $queryk);
          
                // чекаем все поля все ли хорошо там
          
                if($ult){
                    echo "<div class='form'>
                    <h3>изменили менеджера</h3><br/>
                    </div>";
                }else{
                    echo "<div class='form'>
                    <h3>Ты где то напакостил</h3><br/>
                    </div>";
                     }    
         
           
          
          
          }
    }
    
    
    
    
    
    ?>
<form method="POST" >
     
     <table border="1">
     
     <th>id</th>
     <th>имя </th>
     <th>фамилия</th>
     <th>телефон</th>
     <th>рождение</th>
     <th>пароль</th>
     <th>емайл</th>
     <th>баланс</th>
     <th>удалить</th>
     <?php 
        
         $query= "SELECT * FROM `users` ";
         $result = mysqli_query($con, $query) or die;
         
         for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row)
         $i++;
         ;
         
         foreach($data as $elem){
         
             echo "<tr>";
             echo "<td>".$elem['id']."</td>";
             echo "<td>".$elem['first_name']."</td>";
             echo "<td>".$elem['last_name']."</td>";
             echo "<td>".$elem['phone']."</td>";
             echo "<td>".$elem['data']."</td>";
             echo "<td>".$elem['password']."</td>";
             echo "<td>".$elem['email']."</td>";
             echo "<td>".$elem['balenc']."</td>";
             $idz = $elem['id'];
             echo '<td><form method="post"><input type="submit" value="отказаться" name='.$idz.'>     </form></td>';
             if(isset($_POST["$idz"])){
                $query="DELETE FROM `users` WHERE id=$idz";
                    mysqli_query($con , $query) or die ;
             }
             echo "</tr>";
         }
         
     
        
     
     
     
     ?>
  
     

     </table></form>