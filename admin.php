<?php
session_start();
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
}
?>


<!DOCTYPE html>
<html>
    <head>
       <title>TAM</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body id = "admin">
        <h1>TAM: The Art of Music</h1>
        <h1>Welcome: <?php echo $user;?></h1>
        <form method = "post"  action ="search.php">
            <input id="SongName" type="radio" name="searchType" value="SongName">
            <label for="SongName">Search By Song name</label><br>
            <input id="Artist" type="radio" name="searchType" value="Artist">
            <label for="Artist">Search By Artist name</label><br>
            <input id="genre" type="radio" name="genre" value="genre">
            <label for="genre">Search By Genre</label><br>
            <input id="search" type="text" name = "search" placeholder="Search Song or atrist">
            <input id="submit" type="submit" value="Search">
        </form>
        <from method = "post">
            <input id="add" type="button" value="Add">
            <input id="delete" type="button" value="Delete">
            <input id = "update" type="button" value="Update Password"/>
        </form>
        
        <br>
        <span style="font-size: 1.3em;" id = "changes"></span>
        <span id='status'></span>
        
         <!--Javascript files-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="functions.js"></script>
        
    </body>
    
</html>