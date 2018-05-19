<!DOCTYPE html>
<html>
  <head>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body id= 'searching'>
    <h1>TAM</h1>
<?php
session_start();

include 'dbConnection.php';
$connect = connectToDB();

//Checking credentials in database
// $sql = "SELECT * FROM music
//         WHERE SongName = :SongName
//         AND Artist = :Artist";
// $stmt = $connect->prepare($sql);

// if(isset($_POST['searchType'])){
//     echo $_POST['search'];
// }
echo "<form method = 'post' action = 'LogOut.php'>
          <input id = 'submit' type = 'submit' value = 'Logout'>
          </form>";
 echo "<form method = 'post'  action ='search.php'>
            <input id='SongName' type='radio' name='searchType' value='SongName'>
            <label for='SongName'>Search By Song name</label><br>
            <input id='Artist' type='radio' name='searchType' value='Artist'>
            <label for='Artist'>Search By Artist name</label><br>
            <input id='genre' type='radio' name='searchType' value='genre'>
            <label for='genre'>Search By Genre</label><br>
            <input id='search' type='text' name = 'search' placeholder='Search Song or atrist'>
            <input id='submit' type='submit' value='Search'>
        </form>";
        
//echo $_POST['searchType'];

if($_POST['searchType'] == "SongName"){
  $sql = "SELECT * FROM music
        WHERE SongName = :SongName";
  $stmt = $connect->prepare($sql);
  $data=array(":SongName" => $_POST['search']);
  $stmt-> execute($data);
  $info = $stmt->fetchALL(PDO::FETCH_ASSOC);

//print_r($info);
  if(isset($info)){
  //echo $info['songLink'];
  //echo "<br>";
    //print_r($_SESSION);-->
foreach($info as $song){
      // $_SESSION['songLink'] = $info['songLink'];
      // $_SESSION['albumPic']= $info['albumPic'];
      // $_SESSION['artist'] = $info['Artist'];
      // $_SESSION['year'] = $info['releaseYear'];
      // $_SESSION['genre'] = $info['genre'];
       $url = $url.str_replace('watch?v=', 'embed/', $song['songLink']);
     //echo $_SESSION['artist'];

// "<audio controls>
//   <source src = 'music/country/'" . $_SESSION['songName'] . "'.mp3' type='audio/ogg'>
// Your browser does not support the audio element.
// </audio>"-->

  echo "<div id='content-wrapper'>
     <div id = 'pic'>
    <img src = {$song['albumPic']} alt='albumPic' style='width:400px;height:315px;
    </div>
    <div id = 'audio'>
    <iframe width='420' height='315' src={$url} frameborder='0' allowfullscreen></iframe>

    </div>
    <div id = artist> Artist: {$song['Artist']}</div>
    <div id =info> Release Year: {$song['releaseYear']} Genre: {$song['genre']}</div>
    </div>";
}
}
else{
  echo "Song Does not exist in the DataBase";
}
}
else if ($_POST['searchType']=="Artist"){
  $sql = "SELECT * FROM music
        WHERE Artist = :Artist";
$stmt = $connect->prepare($sql);
  //echo "Hello";
  $data=array(":Artist" => $_POST['search']);
  $stmt-> execute($data);
  $info = $stmt->fetchALL(PDO::FETCH_ASSOC);

  if(isset($info)){
    foreach( $info as $song){
  //echo $info['songLink'];
  //echo "<br>";
    //print_r($_SESSION);-->
      // $_SESSION['songLink'] = $info['songLink'];
      // $_SESSION['albumPic']= $info['albumPic'];
      // $_SESSION['artist'] = $info['Artist'];
      // $_SESSION['year'] = $info['releaseYear'];
      // $_SESSION['genre'] = $info['genre'];
      $url = $url.str_replace('watch?v=', 'embed/', $song['songLink']);
     //echo $_SESSION['artist'];
     //echo $url;

// "<audio controls>
//   <source src = 'music/country/'" . $_SESSION['songName'] . "'.mp3' type='audio/ogg'>
// Your browser does not support the audio element.
// </audio>"-->

  echo "<div id='content-wrapper'>
     <div id = 'pic'>
    <img src = {$song['albumPic']} alt='albumPic' style='width:400px;height:315px;
    </div>
    <div id = 'audio'>
    <iframe width='420' height='315' src={$url} frameborder='0' allowfullscreen></iframe>

    </div>
    <div id = artist> Artist: {$song['artist']}</div>
    <div id =info> Release Year: {$song['year']} Genre: {$song['genre']}</div>
    </div>";
    echo "<br>";
    
}
}
else{
  echo "Artist Not in DataBase";
}
}
if($_POST['searchType'] == "genre"){
  $sql = "SELECT * FROM music
        WHERE genre = :genre";
  $stmt = $connect->prepare($sql);
  $data=array(":genre" => $_POST['search']);
  $stmt-> execute($data);
  $info = $stmt->fetchALL(PDO::FETCH_ASSOC);

//print_r($info);
  if(isset($info)){
  //echo $info['songLink'];
  //echo "<br>";
    //print_r($_SESSION);-->
foreach($info as $song){
      // $_SESSION['songLink'] = $info['songLink'];
      // $_SESSION['albumPic']= $info['albumPic'];
      // $_SESSION['artist'] = $info['Artist'];
      // $_SESSION['year'] = $info['releaseYear'];
      // $_SESSION['genre'] = $info['genre'];
       $url = $url.str_replace('watch?v=', 'embed/', $song['songLink']);
     //echo $_SESSION['artist'];

// "<audio controls>
//   <source src = 'music/country/'" . $_SESSION['songName'] . "'.mp3' type='audio/ogg'>
// Your browser does not support the audio element.
// </audio>"-->

  echo "<div id='content-wrapper'>
     <div id = 'pic'>
    <img src = {$song['albumPic']} alt='albumPic' style='width:400px;height:315px;
    </div>
    <div id = 'audio'>
    <iframe width='420' height='315' src={$url} frameborder='0' allowfullscreen></iframe>

    </div>
    <div id = artist> Artist: {$song['Artist']}</div>
    <div id =info> Release Year: {$song['releaseYear']} Genre: {$song['genre']}</div>
    </div>";
}
}
else{
  echo "Genre Does not exist in the DataBase";
}
}
// <iframe width='560' height='315' src={$_SESSION['songLink']} frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>
//print_r($info);
//echo json_encode($info);
?>
</body>
</html>