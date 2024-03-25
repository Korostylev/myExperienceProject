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

    /*header('Content-Type: text/html; charset=UTF-8');// Важно для куков!!! весь файл без BOM, а эта строчка нужна!
    $userinfo='';
    $state='0';

    if($state != 1) {// если после проверки куков, оказалось, что пользователь не авторизован, то идем дальше
        if( (isset($_POST['login'])) & (isset($_POST['pass'])) ){ // если пользователь ввёл логин и пароль
        $login = $_POST['login'];	
       
        // проверяем наличие пользователя в БД и достаём оттуда пароль
        $sql = "SELECT * FROM `users` WHERE `login`='$login'";
        $res = mysqli_query($connected, $sql);
          if(mysqli_num_rows($res)>0) {// если пользователь есть в БД
            $userinfo = mysqli_fetch_array($res);// в этой переменной будет лежать вся информация о пользователе из БД
            $pass = md5($_POST['pass']);
            if(strcmp($pass,$userinfo['pass'])==0){
              // устанавливаем куки для запоминания статуса пользователя
              setcookie("login", $login, time()+36000);
              setcookie("pass", $pass, time()+36000);
              $state = 1;// статус, если 1, тогда пользователь авторизован
            }
          }
        }
    }*/
?>