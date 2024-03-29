<?php
  require_once('../db_authorization.php'); // $connected
  require_once('../authentication.php'); // $userinfo $state

  if ($state == 1 & isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = $_GET['title'];
    $description = $_GET['description'];
    $color = '#'.$_GET['color'];
    $chapterId = $_GET['chapterid'];

    if ($chapterId > 0){
      if ($id > 0){
        $resEditChapter = mysqli_query($connected, "UPDATE `subchapters` SET `title`='$title', `description`='$description', `color`='$color' WHERE `id`='$id'");
      }
      else {
        $resAddChapter = mysqli_query($connected, "INSERT INTO `subchapters` (`chapter_id`,`title`,`description`,`color`,`top_c`,`left_c`) VALUES ('$chapterId','$title','$description','$color', 20, 20)");
      }
    }
  }
?>