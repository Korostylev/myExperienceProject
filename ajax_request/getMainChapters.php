<?php
  require_once('../db_authorization.php'); // $connected
  require_once('authentication.php'); // $userinfo $state

  if ($state == 1){
    $user_id = $userinfo['id'];
    if($resultChapters = mysqli_query($connected, "SELECT * FROM `main_chapters` WHERE `user_id`='$user_id'")){
      foreach($resultChapters as $row){
        $title = $row['title'];
        $id = $row['id'];
        $color = $row['color'];
        echo '<div class="main-list-item" style="border-color: blue; background-color:',$color,';" onclick="clickMainListItem(event, ',$id,')">', $title, '
          <div class="edit-icon chapter-edit-btn"  onclick="editChapter(',$id,')"><img src="../img/edit.png" alt="редактировать"></div>
          <div class="edit-icon chapter-del-btn"  onclick="deleteWindow(',$id,',0)"><img src="../img/delete.png" alt="удалить"></div></div>';
      }
    }
  }
?>