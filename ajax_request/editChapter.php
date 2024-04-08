<?php
  require_once('../db_authorization.php'); // $connected
  require_once('../authentication.php'); // $userinfo $state

  if ($state == 1 & isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = $_GET['title'];
    $description = $_GET['description'];
    $color = '#'.$_GET['color'];
    $user_id = $userinfo['id'];

    if ($id > 0){
      $resEditChapter = mysqli_query($connected, "UPDATE `main_chapters` SET `title`='$title', `description`='$description', `color`='$color' WHERE `id`='$id'");
    }
    else {
      $resAddChapter = mysqli_query($connected, "INSERT INTO `main_chapters` (`title`,`description`,`color`,`user_id`) VALUES ('$title','$description','$color','$user_id')");
    }
  }
?>