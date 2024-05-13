<?php
  require_once('../db_authorization.php'); // $connected
  require_once('authentication.php'); // $userinfo $state
  if ($state == 1 & isset($_GET['id'])){
    
    $id = $_GET['id'];
    if ($id > 0){
      //$user_id = $userinfo['id'];
      $resultChapter = mysqli_query($connected, "SELECT * FROM `main_chapters` WHERE `id`='$id'");
      if(mysqli_num_rows($resultChapter)){
        $chapterElement = mysqli_fetch_array($resultChapter);
        $title = $chapterElement['title'];
        $description = $chapterElement['description'];
        $color = $chapterElement['color'];
        $user_id = $chapterElement['user_id'];
        if ($user_id == $userinfo['id']){
          echo '<div class="title-window">Редактировать группу</div>
          <form action="/index.php" method="post">
            <div class="form-element"><input id="chapter_title" type="text" name="title" placeholder="Заголовок" value="',$title,'"/></div>
            <div class="form-element">
              <textarea id="chapter_description" name="description" placeholder="Описание" maxlength="254" >',$description,'</textarea>
            </div>
            <div class="form-element">
              <input id="chapter_color" type="color" name="color" placeholder="Цвет" style="margin-right: 40px; height: 32px; padding: 0px;"  value="',$color,'" />
              <input class="button" type="button" value="Сохранить"  onclick="addChapter()"/>
              <input id="chapter_id" type="hidden" name="id" value="',$id,'" />
            </div>
          </form>';
        }
      }
    }
    else {
      echo '<div class="title-window">Добавить ежедневку</div>
				<form>
					<div class="form-element"><input id="task_title" type="text" name="title" placeholder="Заголовок" /></div>
					<div class="form-element">
						<textarea id="task_description" name="description" placeholder="Описание" maxlength="254" ></textarea>
					</div>
					<div class="form-element">
						<input class="button" type="button" value="Добавить"  onclick="addDailyTask()"/>
						<input id="task_id" type="hidden" name="id" value="0" />
					</div>
				</form>';
    }
  }
?>