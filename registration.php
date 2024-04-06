<?php
  if( (isset($_POST['typeOperation'])) & $_POST['typeOperation'] == 'reg'){
    if( (isset($_POST['login'])) & (isset($_POST['pass1'])) & (isset($_POST['pass2'])) ){
      $login = $_POST['login'];
      $sql = "SELECT * FROM `users` WHERE `login`='$login'";
      $res = mysqli_query($connected, $sql);
      if(mysqli_num_rows($res) == 0) {// если пользователь есть в БД
        $pass = $_POST['pass1'];
        if ($pass == $_POST['pass2']){
          $name = 'User';
          if (isset($_POST['name'])){
            $name = $_POST['name'];
          }
          $privilege = 'user';
          $pass = md5($pass);
          $resAddUser = mysqli_query($connected, "INSERT INTO `users` (`login`,`pass`,`name`,`privilege`) VALUES ('$login','$pass','$name','$privilege')");
        }
        else {
          echo 'error password';
        }
      }
      else {
        echo 'error login';
      }
    }
    else {
      echo 'error полей';
    }
  }
?>