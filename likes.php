<?php
session_start();

include 'dbConnection.php';
$connect = connectToDB();

//echo $_POST['searchType'];
//UPDATE `users` SET `username`=[value-1],`password`=[value-2],`id`=[value-3] WHERE 1
  $sql = "Select * FROM `likes` WHERE songId = {$_POST['id']}";
  $stmt = $connect->prepare($sql);
  $data=array(":password" => $_POST['password']);
  $stmt-> execute();
  $info = $stmt->fetch(PDO::FETCH_ASSOC);
  echo json_encode($info);
?>