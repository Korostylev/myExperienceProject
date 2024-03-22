<html>
    <head>
		<meta charset="utf-8">
		<title>
			Чудо чудное
		</title>
		<link rel="stylesheet" href="css/main.css">
	</head>
    <body>
		<div id="window-login">
		<div id="window">
			<a href="#" class="close-window">Закрыть окно</a>
			<div class="login-form">
				<form action="" method="post">
					<div class="form-element">
						<label for="login">Логин: </label>
						<input type="text" name="login" />
					</div>
					<div class="form-element">
						<label for="pass">Пароль: </label>
						<input type="password" name="pass" />
					</div>
					<div class="form-element">
						<input type="submit" value="Войти" />
					</div>
				</form>
			</div>
			<div class="registration-form">
				<form action="" method="post">
					<div class="form-element">
						<label for="name">Имя: </label>
						<input type="text" name="name" />
					</div>
					<div class="form-element">
						<label for="login">Логин: </label>
						<input type="text" name="login" />
					</div>
					<div class="form-element">
						<label for="pass1">Пароль: </label>
						<input type="password" name="pass1" />
					</div>
					<div class="form-element">
						<label for="pass2">Пароль еще раз: </label>
						<input type="password" name="pass2" />
					</div>
					<div class="form-element">
						<input type="submit" value="Зарегистрировать" />
					</div>
				</form>
			</div>
		</div>
		</div>
		
		<div class="main-content">
			<a href="#window-login">Вход/Регистрация</a>
		</div>
		
		<script src="js/main.js"></script>
	</body>
</html>