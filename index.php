<?php 
	require_once('db_authorization.php'); // $connected
	require_once('registration.php'); 
	require_once('authentication.php'); // $userinfo $state
	//require_once('add_chapter.php'); 
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
		<!--<input value="Голосовать!" onclick="vote()" type="button" />
		<div id="vote_status">Здесь будет ответ сервера</div>-->
		<div id="info_div">Здесь будет ответ сервера</div>

		<div class="main-content">
			<div class="left-area">
				<div class="user-area">
					<?php 
						if ($state != 1){
							echo '<a href="#window-login">Вход/Регистрация</a>';
						}
						else {
							echo '<div>',$userinfo['login'],'</div>'
					?>
						<a href="/index.php?exit=y">выход</a><br>
						<button class="simple-button" onclick="editChapter(0)">Добавить группу</button>
						<div class="main-list-item" style="border-color: blue; background-color: #81c1fc;" onclick="clickMainListItem(event, -1)">Календарь</div>
						<!--<a href="#window-addchapter">добавить группу</a><br>
						<a href="#window-addsubchapter">добавить элемент</a><br>-->
					<?php 
						}
					?>
					
				</div>
				<div id="main-list-menu" class="main-list-menu">
					<?php 
						/*if ($state == 1){
							$user_id = $userinfo['id'];
							if($resultChapters = mysqli_query($connected, "SELECT * FROM `main_chapters` WHERE `user_id`='$user_id'")){
								foreach($resultChapters as $row){
									$title = $row['title'];
									$id = $row['id'];
									$color = $row['color'];
									echo '<div class="main-list-item" style="border-color: blue; background-color:',$color,';" onclick="clickMainListItem(event, ',$id,')">', $title, '</div>';
								}
							}
						}
						*/
					?>
				</div>
			</div>
			<div class="right-area">
				<div id="elements-area" class="elements-area">
					<div class="moved-element">1</div>
					<div class="moved-element">2</div>
					<div class="moved-element">3</div>
				</div>
			</div>
		</div>
		
		<div id="window-login">
		<div class="window">
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
		<div id="window-addchapter">
		<div class="window">
			<a href="#" class="close-window" onclick="closeWindows()"><img src="/img/close.png" alt="закрыть"></img></a>
			<div id="chapter-editing-window-area">
				<div class="title-window">Добавить группу</div>
				<form action="/index.php" method="post">
					<div class="form-element"><input id="chapter_title" type="text" name="title" placeholder="Заголовок" /></div>
					<div class="form-element">
						<textarea id="chapter_description" name="description" placeholder='Описание' maxlength='254' ></textarea>
					</div>
					<div class="form-element">
						<input id="chapter_color" type="color" name="color" placeholder="Цвет" style="margin-right: 40px; height: 32px; padding: 0px;" />
						<input class="button" type="button" value="Добавить"  onclick="addChapter()"/>
						<input id="chapter_id" type="hidden" name="id" value="0" />
					</div>
				</form>
			</div>
		</div>
		</div>
		<div id="window-addsubchapter">
		<div class="window">
			<a href="#" class="close-window" onclick="closeWindows()"><img src="/img/close.png" alt="закрыть"></img></a>
			<div id="subchapter-editing-window-area">
				<div class="title-window">Добавить элемент</div>
				<form action="/index.php" >
					<div class="form-element"><input id="subchapter_title" type="text" name="title" placeholder="Заголовок" /></div>
					<div class="form-element">
						<textarea id="subchapter_description" name="description" placeholder='Описание' maxlength='254' ></textarea>
					</div>
					<div class="form-element">
						<input id="subchapter_color" type="color" name="color" placeholder="Цвет" style="margin-right: 40px; height: 32px; padding: 0px;" />
						<input class="button" type="button" value="Добавить"  onclick="addSubchapter()"/>
						<input id="subchapter_id" type="hidden" name="id" value="0" />
						<input id="subchapter_chapter_id" type="hidden" name="chapter_id" value="0" />
					</div>
				</form>
			</div>
		</div>
		</div>
		<div id="window-adddailytask">
		<div class="window">
			<a href="#" class="close-window" onclick="closeWindows()"><img src="/img/close.png" alt="закрыть"></img></a>
			<div id="dailytask-editing-window-area">
				<!--<div class="title-window">Добавить группу</div>
				<form action="/index.php" method="post">
					<div class="form-element"><input id="chapter_title" type="text" name="title" placeholder="Заголовок" /></div>
					<div class="form-element">
						<textarea id="chapter_description" name="description" placeholder='Описание' maxlength='254' ></textarea>
					</div>
					<div class="form-element">
						<input id="chapter_color" type="color" name="color" placeholder="Цвет" style="margin-right: 40px; height: 32px; padding: 0px;" />
						<input class="button" type="button" value="Добавить"  onclick="addChapter()"/>
						<input id="chapter_id" type="hidden" name="id" value="0" />
					</div>
				</form>-->
			</div>
		</div>
		</div>
		<div id="window-loading">
		<div class="window">
			<div id="loading-message" class="loading-message">Загрузка...</div>
			<a href="#window-loading" id="open-loading" style="display:none;"></a>
		</div>
		</div>
		<div id="window-view-subchapter">
		<div class="window">
			<a href="#" class="close-window" onclick="closeWindows()"><img src="/img/close.png" alt="закрыть"></img></a>
			<div id="content-view-subchapter" ></div>
			<a href="#window-view-subchapter" id="open-view-subchapter" style="display:none;"></a>
		</div>
		</div>
		<div id="window-delete">
		<div class="window">
			<div id="content-window-delete" >
			<div id="window-delete-title" class="title-window">Удалить?</div>
			<form action="/index.php" >
			<div class="form-element">
				<input class="button" type="button" value="Да"  onclick="deleteElement()"/>
				<input class="button" type="button" value="Нет"  onclick="closeWindows()"/>
				<input id="window-delete-chapter" type="hidden" value="0" />
				<input id="window-delete-subchapter" type="hidden" value="0" />
			</div>
			</form>
			</div>
		</div>
		</div>

		<script src="js/ajax_request.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>