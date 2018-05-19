<?
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body id = "login">
        <h1>Login</h1>
        
        <!--Form to enter credentials-->
        <form method= "post" action="verifyUser.php">
            <input type="text" name="username" placeholder="Username"/><br>
            <input type="password" name="password" placeholder = "Password"/><br>
            <input type ="submit" name="submit" value="Login"/>
        </form>
        <form method="post" action="TAL.php">
            <input type = "submit" name ="submit" value = "Guest">
        </form>

    </body>
</html>