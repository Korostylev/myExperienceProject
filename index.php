<?php 
	require_once('db_authorization.php'); 
	require_once('registration.php'); 
	require_once('authentication.php'); 
?>
<html>
    <head>
		<meta charset="utf-8">
		<title>
			Чудо чудное
		</title>
		<link rel="icon" type="image/x-icon" href="/img/favicon.ico">
		<link rel="stylesheet" href="css/main.css">
	</head>
    <body>
		<div id="window-login">
		<div id="window">
			<a href="#" class="close-window"><img src="/img/close.png" alt="закрыть"></img></a>
			<div class="tab">
				<button class="tablinks-login" onclick="openLogin(event, 'login-form')">Вход</button>
				<button class="tablinks-login" onclick="openLogin(event, 'registration-form')">Регистрация</button>
			</div>
			<div>
				<div id="login-form" class="tabcontent-login">
					<form action="/index.php" method="post" style="margin-top:40px;">
						<div class="form-element"><input type="text" name="login" placeholder="Логин" /></div>
						<div class="form-element"><input type="password" name="pass" placeholder="Пароль" /></div>
						<div class="form-element"><input class="button" type="submit" value="Войти" /><input type="hidden" name="typeOperation" value="enter" /></div>
					</form>
				</div>
				<div id="registration-form" class="tabcontent-login">
					<form action="/index.php" method="post" style="margin-top:10px;">
						<div class="form-element"><input type="text" name="name" placeholder="Имя" /></div>
						<div class="form-element"><input type="text" name="login" placeholder="Логин" /></div>
						<div class="form-element"><input type="password" name="pass1" placeholder="Пароль" /></div>
						<div class="form-element"><input type="password" name="pass2" placeholder="Повторить пароль" /></div>
						<div class="form-element"><input class="button" type="submit" value="Зарегистрировать" /><input type="hidden" name="typeOperation" value="reg" /></div>
					</form>
				</div>
			</div>
		</div>
		</div>
		
		<div class="main-content">
			<div class="left-area">
				<div class="user-area">
					<a href="#window-login">Вход/Регистрация</a>
				</div>
				<div class="main-list-menu">
					<?php 
						$mainList = array('яблоко','апельсин','виноград','дыня','помидор');
						for ($i = 0; $i < count($mainList); $i++){
							echo '<div class="main-list-item" style="border-color: blue;" onclick="clickMainListItem(event, ',$i,')">', $mainList[$i], '</div>';
						}
					?>
				</div>
			</div>
			<div class="right-area">

			</div>
		</div>
		
		<script src="js/main.js"></script>
	</body>
</html>