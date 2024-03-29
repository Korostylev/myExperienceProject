<?php
  require_once('../db_authorization.php'); // $connected
  require_once('../authentication.php'); // $userinfo $state

  if ($state == 1 & isset($_GET['id']) & isset($_GET['top']) & isset($_GET['left'])) {
    $id = $_GET['id'];
    $top = $_GET['top'];
    $left = $_GET['left'];
    $resultChapters = mysqli_query($connected, "UPDATE `subchapters` SET `top_c`='$top', `left_c`='$left' WHERE `id`='$id'");
  }
?>