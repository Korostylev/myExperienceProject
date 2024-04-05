<?php
  require_once('../db_authorization.php'); // $connected
  require_once('../authentication.php'); // $userinfo $state

  if ($state == 1 & isset($_GET['subchapterid'])) {
    $id = $_GET['subchapterid'];
		$resultSubchapter = mysqli_query($connected, "SELECT * FROM `subchapters` WHERE `id`='$id'");
    if(mysqli_num_rows($resultSubchapter)){
      $subchapterElement = mysqli_fetch_array($resultSubchapter);
      $title = $subchapterElement['title'];
      $description = $subchapterElement['description'];
      $color = $subchapterElement['color'];
      $date = $subchapterElement['date'];
      echo '<div style="background-color:',$color,';"><div>',$title,'</div><div>',$description,'</div><div>',$date,'</div></div>';
    }
  }
?>