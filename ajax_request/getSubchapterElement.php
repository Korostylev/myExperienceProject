<?php
  require_once('../db_authorization.php'); // $connected
  require_once('authentication.php'); // $userinfo $state

  if ($state == 1 & isset($_GET['subchapterid'])) {
    $id = $_GET['subchapterid'];
		$resultSubchapter = mysqli_query($connected, "SELECT * FROM `subchapters` WHERE `id`='$id'");
    if(mysqli_num_rows($resultSubchapter)){
      $subchapterElement = mysqli_fetch_array($resultSubchapter);
      $title = $subchapterElement['title'];
      $description = $subchapterElement['description'];
      $color = $subchapterElement['color'];
      $date = $subchapterElement['date'];
      echo '<div id="content-view-subchapter-div" style="background-color:',$color,';"><div>',$title,'</div><div>',$description,'</div><div>',$date,'</div>
        <div><div class="edit-icon subchapter-edit-btn"  onclick="editSubchapter(',$id,')"><img src="../img/edit.png" alt="редактировать"></div>
        <div class="edit-icon subchapter-del-btn"  onclick="deleteWindow(0,',$id,')"><img src="../img/delete.png" alt="удалить"></div></div></div>';
    }
  }
?>