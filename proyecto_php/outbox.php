<?php
session_start();
require "config.php";
require "session.php";
check_session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="color: red; position: absolute; right: 0px"><?php echo $_SESSION["email"] ?></div>
    <h1>OutBox</h1>

    <?php

    // require "header.php";
    // identificacion();
    $userId = $_SESSION['id'];
    $sql = "select users.email, messages.MessageId, messages.FromUserId, messages.ToUserId, messages.Subject, messages.Text, messages.Timestamp 
from users, messages 
WHERE messages.FromUserId=$userId and users.userId=messages.ToUserId 
ORDER by messages.Timestamp DESC;";

    $result = mysqli_query($link, $sql);
    // var_dump($result);

    while ($mostrar = mysqli_fetch_array($result)) {
        $messageId = $mostrar['MessageId'];
        // $isRead = $mostrar['IsRead'];
    ?>
        <div>Message: <br>
            <?php
            echo "Send to-->" . $mostrar['email'] . "<br>";
            echo "Subject-->" . $mostrar['Subject'] . "<br>";
            echo "<a href='see_messageOutbox.php?messageId=$messageId'>Go to message</a> ";
            ?>
            <br><br>
        </div>
    <?php
    }
    ?>
    <a href="welcome.php">Go back</a>
    <br>
    <a href="logout.php">Logout</a>
</body>

</html>