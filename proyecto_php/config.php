<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "chat";

   /* Attempt to connect to MySQL database */
$link = mysqli_connect($host,$user,$password,$db);
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>