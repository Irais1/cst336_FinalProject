<?php
session_start();

include 'dbConnection.php';
$connect = connectToDB();

//echo $_POST['searchType'];
//print_r($_POST);
  $sql = "INSERT INTO `music`(`albumPic`, `songLink`, `SongName`, `Artist`, `releaseYear`, `genre`, `id`) VALUES ('".$_POST['albumPic']."','".$_POST['songLink']."','".$_POST['songName']."','".$_POST['Artist']."','".$_POST['year']."','".$_POST['genre']."', NULL)";
  $stmt = $connect->prepare($sql);
  $data=array(":SongName" => $_POST['search']);
  $stmt-> execute();
  //$info = $stmt->fetch(PDO::FETCH_ASSOC);
  echo json_encode(5);
?>