<?php
    $userinfo='';
    $state='0';

    if( (isset($_COOKIE['login'])) & (isset($_COOKIE['pass'])) ) {// если в куках лежит логин и зашифрованый пароля
        $login=$_COOKIE['login'];
        $pass=$_COOKIE['pass'];
        $time=time();
    
        // проверяем наличие пользователя в БД и достаём оттуда пароль
        $sql="SELECT * FROM `users` WHERE `login`='$login'";
        $res=mysqli_query($connected, $sql);
        if(mysqli_num_rows($res)){// если пользователь есть в БД
          $userinfo = mysqli_fetch_array($res);// в этой переменной лежит пароль из БД
          if(strcmp($pass,$userinfo['pass']) == 0) { //проверяем схожесть пароля из БД с паролем из куков
            $state = 1;// статус, если 1, тогда пользователь авторизован
          }
          else {
            echo 'error pass from cookie';
            setcookie("login", '', $time-1000, '/' );
            setcookie("pass", '', $time-1000, '/' );
          }
        }
        else {
          echo 'error login from cookie';
          setcookie("login", '', $time-1000, '/' );
          setcookie("pass", '', $time-1000, '/' );
        }
  }
?>