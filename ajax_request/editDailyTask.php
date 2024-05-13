<?php
  require_once('../db_authorization.php'); // $connected
  require_once('authentication.php'); // $userinfo $state

  if ($state == 1 & isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = $_GET['title'];
    $description = $_GET['description'];
    $user_id = $userinfo['id'];

    if ($id > 0){
      $resEditChapter = mysqli_query($connected, "UPDATE `daily_tasks` SET `title`='$title', `description`='$description' WHERE `id`='$id'");
    }
    else {
      $resAddChapter = mysqli_query($connected, "INSERT INTO `daily_tasks` (`title`,`description`,`user_id`) VALUES ('$title','$description','$user_id')");
    }
  }
?>