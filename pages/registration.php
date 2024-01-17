<?php include("header.php") ;

require('bd_connect/db.php');

?>



<?php 


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

  

    $query = "INSERT into `users` (first_name, last_name, phone, email,data,password,balenc)
     VALUES ('$first_name', '$last_name', '$mobile', '$email', '$birthday' ,'$password','0')";



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

<h1 class="login-title">Регистрация</h1>
        <input type="text"  class="login-input" name="first_name" placeholder="имя" required />
        <input type="text" class="login-input" name="last_name" placeholder="фамилия" required>
        <input type="text" class="login-input" name="email" placeholder="email" required>
       
        <input type="text" class="login-input"   name="mobile" placeholder="телефон" required>

        <input type="date" class="login-input" name="birthday" placeholder="Дата рождения" required>

        <input type="password" class="login-input" name="password" placeholder="Пароль" required>
        <input type="submit" name="submit" value="Регистрация" class="login-button">
        <p class="link"><a href="login.php">Заергистрированы?</a></p>

</div>


</form> 
 <?php }?>