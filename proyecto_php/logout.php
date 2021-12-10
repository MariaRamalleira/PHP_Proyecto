<!DOCTYPE html>
<?php

    require "session.php";
    check_session();
    $_SESSION = array();
    session_destroy();
    setcookie(session_name(),123,time(),- 1000);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>