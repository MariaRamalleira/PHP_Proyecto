<?php
session_start();
require "session.php";
check_session();
require_once "config.php";
// require "header.php";
// identificacion();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/welcome.css">
</head>

<body>
<div style="color: red; position: absolute; right: 0px"><?php echo $_SESSION["email"]?></div>

    <h1>Inbox</h1>

<?php
$userId = $_SESSION['id'];
$sql = "SELECT messages.MessageId, users.email,messages.FromUserId, messages.ToUserId, messages.Subject, messages.Text, 
messages.Timestamp, messages.IsRead 
from messages,users
where messages.FromUserId = users.userId and messages.ToUserId like $userId
order by messages.Timestamp DESC ;";

$result = mysqli_query($link, $sql);

while ($mostrar = mysqli_fetch_array($result)) {
    $messageId = $mostrar['MessageId'];
    $isRead = $mostrar['IsRead'];
?>
    <!-- <div style="color: red; position: absolute; right: 0px"><?php echo $_SESSION["email"]?></div> -->
    <div class="message">Message: <br>
        <?php echo $mostrar['email'] . " <br>" ?><?php echo $mostrar['Subject'] .  "<br> "."<a href='see_message.php?messageId=$messageId'>Go to message</a> "; ?>
        <br>
        <?php if($isRead){echo "<i class='fas fa-envelope-open'></i>";}else{echo "<i class='fas fa-envelope'></i>";} ?>
        <br>
    </div>
    
<?php
}
?>
<a href="outbox.php">OutBox</a>
<br>
<a href="new_message.php">Create message</a>
<br>
<a href="logout.php">Logout</a>
</body>
</html>