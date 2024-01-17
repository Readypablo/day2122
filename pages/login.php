<?php include("header.php") ;

require('bd_connect/db.php');


ini_set('session_gc_maxlifetime', 1);
session_start();
// Когда форма отправлена, проверьте и создайте сеанс пользователя.
if (isset($_POST['email'])) {
    $email = stripslashes($_REQUEST['email']);    
    $email = mysqli_real_escape_string($con, $email);

    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);

// Проверьте, существует ли пользователь в базе данных
    $query    = "SELECT * FROM `users` WHERE email='$email'
                 AND password='$password'";

    $result = mysqli_query($con , $query) or die ;
    $rows = mysqli_num_rows($result);
    if( $rows==1){

        // берем данные из базы чтоб потом их передать
        if($result){
            $main_user = mysqli_fetch_assoc($result);
            $_SESSION['user_name_us']=$main_user['first_name'];
            $_SESSION['user_name_last']=$main_user['last_name'];
            $_SESSION['user_mobile']=$main_user['email'];
            $_SESSION['user_birthday']=$main_user['data'];
            $_SESSION['balenc']=$main_user['balenc'];
           $_SESSION['first_name'] = $email;

      
             header("Location: profil.php");
    }
// если данные не совпали
    }else{
        echo "
        
        <div class='main-content'>
        <div class='main-info'>
        <div class='form-error'>
        <h3>Неправильный email или пароль</h3><br/>
        <p class='link'>Нажмите чтоб <a href='login.php'>повторить</a> попытку.</p>
        </div>
        </div>
        </div>";
    }
}else{

?>







<form action="" method="post" class="form_form">

<div class="form">
<h2 >Войдите в профиль</h2>
            <input type="text" class="login-input" name="email" placeholder="email" required>


            <div class="konid-nusial">
  <input type="password" id="vekodnaya-prokhodna" class="login-input" placeholder="Введите пароль" name="password" value="">
  <label><input type="checkbox" class="apavolku-galocksed"> Показать пароль</label>
</div>



            
            <input type="submit" value="Войти" name="submit" class="login-button" >
            <p class="link"> <a href="registration.php"> Зарегистрировавться </a></p>
</div>


</form>

<?php } ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>$('body').on('click', '.apavolku-galocksed', function(){
  if ($(this).is(':checked')){
  $('#vekodnaya-prokhodna').attr('type', 'text');
  } else {
  $('#vekodnaya-prokhodna').attr('type', 'password');
  }
});</script>
