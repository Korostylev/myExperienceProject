<?php
  require_once('../db_authorization.php'); // $connected
  require_once('../authentication.php'); // $userinfo $state
  if ($state == 1 & isset($_GET['id'])){
    $id = $_GET['id'];
    if ($id > 0){
      //$user_id = $userinfo['id'];
      $resultChapter = mysqli_query($connected, "SELECT * FROM `subchapters` WHERE `id`='$id'");
      if(mysqli_num_rows($resultChapter)){
        $chapterElement = mysqli_fetch_array($resultChapter);
        $title = $chapterElement['title'];
        $description = $chapterElement['description'];
        $color = $chapterElement['color'];
        $chapter_id = $chapterElement['chapter_id'];
        echo '<div class="title-window">Редактировать элемент</div>
          <form action="/index.php" >
            <div class="form-element"><input id="subchapter_title" type="text" name="title" placeholder="Заголовок" value="',$title,'" /></div>
            <div class="form-element">
              <textarea id="subchapter_description" name="description" placeholder="Описание" maxlength="254" >',$description,'</textarea>
            </div>
            <div class="form-element">
              <input id="subchapter_color" type="color" name="color" placeholder="Цвет" style="margin-right: 40px; height: 32px; padding: 0px;" value="',$color,'" />
              <input class="button" type="button" value="Сохранить"  onclick="addSubchapter()"/>
              <input id="subchapter_id" type="hidden" name="id" value="',$id,'" />
              <input id="subchapter_chapter_id" type="hidden" name="chapter_id" value="',$chapter_id,'" />
            </div>
          </form>';
      }
    }
    else {
      echo '<div class="title-window">Добавить элемент</div>
      <form action="/index.php" >
        <div class="form-element"><input id="subchapter_title" type="text" name="title" placeholder="Заголовок" /></div>
        <div class="form-element">
          <textarea id="subchapter_description" name="description" placeholder="Описание" maxlength="254" ></textarea>
        </div>
        <div class="form-element">
          <input id="subchapter_color" type="color" name="color" placeholder="Цвет" style="margin-right: 40px; height: 32px; padding: 0px;" />
          <input class="button" type="button" value="Добавить"  onclick="addSubchapter()"/>
          <input id="subchapter_id" type="hidden" name="id" value="0" />
          <input id="subchapter_chapter_id" type="hidden" name="chapter_id" value="0" />
        </div>
      </form>';
    }
  }
?>