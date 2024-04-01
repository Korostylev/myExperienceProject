<?php
    if($state == 1 & (isset($_POST['typeOperation'])) & $_POST['typeOperation'] == 'addchapter') {
      if( isset($_POST['title']) ){
        $title = $_POST['title'];
        $description = '';
        $color = $_POST['color'];
        $user_id = $userinfo['id'];
        if( isset($_POST['description']) ){
          $description = $_POST['description'];
        }
        $resAddChapter = mysqli_query($connected, "INSERT INTO `main_chapters` (`title`,`description`,`color`,`user_id`) VALUES ('$title','$description','$color','$user_id')");
      }
      else {
        echo 'error title';
      }
    }
    if($state == 1 & (isset($_POST['typeOperation'])) & $_POST['typeOperation'] == 'addsubchapter') {
      if( isset($_POST['title']) ){
        $title = $_POST['title'];
        $description = '';
        $color = $_POST['color'];
        $chapter_id = $_POST['chapter_id'];
        if( isset($_POST['description']) ){
          $description = $_POST['description'];
        }
        if ($chapter_id > 0){
          $resAddChapter = mysqli_query($connected, "INSERT INTO `subchapters` (`chapter_id`,`title`,`description`,`color`,`top_c`,`left_c`) VALUES ('$chapter_id','$title','$description','$color', 20, 20)");
        }
      }
      else {
        echo 'error title';
      }
    }
?>