<?php
function connectToDB() {

// $host = 'localhost';
// $db = 'TAM';
// $user = 'Iris';
// $pass = 'cst336';
// $charset = 'utf8mb4';
$host = "us-cdbr-iron-east-05.cleardb.net";
$db = "heroku_c8b34ae9cd193df";
$username = 'bc1d23cb79635b';
     //echo "username: $username";
$password = "e4f61d06";
    
//checking whether the URL contains "herokuapp" (using Heroku)
// if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
//   $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
//   $host = $url["host"];
//   $db   = substr($url["path"], 1);
//   $user = $url["user"];
//   $pass = $url["pass"];
// }

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);
return $pdo; 

}
?>