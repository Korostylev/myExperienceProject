<?php
  require_once('../db_authorization.php'); // $connected
  require_once('authentication.php'); // $userinfo $state

  if ($state == 1 & isset($_GET['chapterid'])) {
    $chapter_id = $_GET['chapterid'];
		if($resultChapters = mysqli_query($connected, "SELECT * FROM `subchapters` WHERE `chapter_id`='$chapter_id'")){
			foreach($resultChapters as $row){
				$title = $row['title'];
				$id = $row['id'];
        echo '<div class="moved-element" idMovedElement="',$id,'" style="background-color:',$row['color'],'; top:',$row['top_c'],'px; left:',$row['left_c'],'px;" >',$title,'</div>';
			}
      echo '<div class="right-area-menu">
          <button class="simple-button" onclick="editSubchapter(0,',$chapter_id,')">Добавить элемент</button>
        </div>';
		}
  }
?>