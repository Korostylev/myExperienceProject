<?php
    /*!!!Чтобы не повредить работоспособности 
        скрипта выше этого комментария 
        не размещайте вообще ничего!!!*/
    ob_start();//важно для отсутствия ошибок
    
    $mysql_host = "localhost"; // sql сервер
    $mysql_user = "user"; // пользователь
    $mysql_password = "1234"; // пароль
    $mysql_database = "game_of_life"; // имя базы данных
    
    $connected = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);
?>