<?php
    header('Content-Type: text/html; charset=UTF-8');// Важно для куков!!! весь файл без BOM, а эта строчка нужна!
    $userinfo='';
    $state='0';

    if( (isset($_COOKIE['login'])) & (isset($_COOKIE['pass'])) ) {// если в куках лежит логин и зашифрованый пароля
      if (!isset($_GET['exit'])) {// если кнопка выход не была нажата
        $login=$_COOKIE['login'];
        $pass=$_COOKIE['pass'];
    
        // проверяем наличие пользователя в БД и достаём оттуда пароль
        $sql="SELECT * FROM `users` WHERE `login`='$login'";
        $res=mysqli_query($connected, $sql);
        if(mysqli_num_rows($res)){// если пользователь есть в БД
          $userinfo = mysqli_fetch_array($res);// в этой переменной лежит пароль из БД
          if(strcmp($pass,$userinfo['pass']) == 0) { //проверяем схожесть пароля из БД с паролем из куков
            $time=time();
            // устанавливаем куки для запоминания статуса пользователя
            setcookie("login",$login,$time+36000);
            setcookie("pass",$pass,$time+36000);
            $state = 1;// статус, если 1, тогда пользователь авторизован
          }
          else {
            echo 'error pass from cookie';
            setcookie("login");
            setcookie("pass");
          }
        }
        else {
          echo 'error login from cookie';
          setcookie("login");
          setcookie("pass");
        }
      } else {
        //обнуляем куки, если была нажата кнопка выход
        setcookie("login");
        setcookie("pass");
      }
    }
    if($state != 1 & (isset($_POST['typeOperation'])) & $_POST['typeOperation'] == 'enter') {// если после проверки куков, оказалось, что пользователь не авторизован, то идем дальше
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
            else{
              echo 'error pass';
            }
          }
          else {
            echo 'error login';
          }
        }
    }
?>