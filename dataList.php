<?php
session_start();

include 'dbConnection.php';
$connect = connectToDB();
$sql = "SELECT * FROM music
        WHERE 1";
$stmt = $connect->prepare($sql);
  //echo "Hello";
  $data=array();
  $stmt-> execute($data);
  $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
  echo json_encode($info);
?>