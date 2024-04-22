<?php
  require_once('../db_authorization.php'); // $connected
  require_once('authentication.php'); // $userinfo $state
  
  if ($state == 1 & isset($_GET['type']) & isset($_GET['id'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    $chapter_id = 0;
    if ($type == 'chapter'){
      $chapter_id = isset($_GET['id']);
    }
    else if ($type == 'subchapter') {
      $resultChapter = mysqli_query($connected, "SELECT * FROM `subchapters` WHERE `id`='$id'");
      if(mysqli_num_rows($resultChapter)){
        $chapterElement = mysqli_fetch_array($resultChapter);
        $chapter_id = $chapterElement['chapter_id'];
      }
      else {
        echo 'нет элемента в базе';
      }
    }
    $resultChapter = mysqli_query($connected, "SELECT * FROM `main_chapters` WHERE `id`='$chapter_id'");
    if(mysqli_num_rows($resultChapter)){
      $chapterElement = mysqli_fetch_array($resultChapter);
      if ($chapterElement['user_id'] == $userinfo['id']){
        if ($type == 'chapter'){
          $resDelete = mysqli_query($connected, "DELETE FROM `main_chapters` WHERE `id`='$id'");
          $resDelete = mysqli_query($connected, "DELETE FROM `subchapters` WHERE `chapter_id`='$id'");
        }
        else if ($type == 'subchapter') {
          $resDelete = mysqli_query($connected, "DELETE FROM `subchapters` WHERE `id`='$id'");
        }
      }
    }
  }
?>