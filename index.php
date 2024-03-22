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
			<!-- Tab links -->
			<div class="tab">
				<button class="tablinks-login" onclick="openLogin(event, 'login-form')">Вход</button>
				<button class="tablinks-login" onclick="openLogin(event, 'registration-form')">Регистрация</button>
			</div>
			<div>
				<div id="login-form" class="tabcontent-login">
					<form action="" method="post" style="margin-top:40px;">
						<div class="form-element"><input type="text" name="login" placeholder="Логин" /></div>
						<div class="form-element"><input type="password" name="pass" placeholder="Пароль" /></div>
						<div class="form-element"><input class="button" type="submit" value="Войти" /></div>
					</form>
				</div>
				<div id="registration-form" class="tabcontent-login">
					<form action="" method="post" style="margin-top:10px;">
						<div class="form-element"><input type="text" name="name" placeholder="Имя" /></div>
						<div class="form-element"><input type="text" name="login" placeholder="Логин" /></div>
						<div class="form-element"><input type="password" name="pass1" placeholder="Пароль" /></div>
						<div class="form-element"><input type="password" name="pass2" placeholder="Повторить пароль" /></div>
						<div class="form-element"><input class="button" type="submit" value="Зарегистрировать" /></div>
					</form>
				</div>
			</div>
		</div>
		</div>
		
		<div class="main-content">
			<a href="#window-login">Вход/Регистрация</a>
		</div>
		
		<script src="js/main.js"></script>
	</body>
</html>