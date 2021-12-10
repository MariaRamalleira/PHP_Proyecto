<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    require "session.php";
    require "config.php";
    $codMg = $_GET['messageId'];
    $query2 = "UPDATE messages SET isRead = 1 WHERE MessageId like $codMg";
    $result = mysqli_query($link, $query2);
    session_start();
    check_session();
        $userId = $_SESSION['id'];
        $messageId = $_GET['messageId'];
        $sql= "SELECT messages.MessageId, users.email, messages.FromUserId, messages.ToUserId, messages.Subject, messages.Text, 
        messages.Timestamp, messages.IsRead 
        from messages,users
        where messages.FromUserId = users.userId and messages.ToUserId like $userId and  messages.MessageId like $messageId;";
         
        $result=mysqli_query($link,$sql);
        $mostrar=mysqli_fetch_array($result);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userId = $_SESSION['id'];
            $segundaPersona=$mostrar['FromUserId'];
            $asunto="Re: ".$mostrar['Subject'];
            $body=$_POST['replay'];
            $currentDate = date('Y-m-d H:i:s');
            $query2 = "INSERT INTO messages VALUES (null, '$userId', '$segundaPersona', '$asunto', '$body', '$currentDate', 0)";
            $result = mysqli_query($link, $query2);
        }
     ?>
     <div style="color: red; position: absolute; right: 0px"><?php echo $_SESSION["email"]?></div>
       <br>
       <div class="emailUser" >From: <br><?php echo $mostrar['email'];?></div><br>
       <div class="emailUser" >Subject: <br><?php echo $mostrar['Subject'];?></div><br>
       <div class="emailUser" >Text: <br><?php echo $mostrar['Text'];?></div><br>
       <div class="emailUser" ><?php echo $mostrar['Timestamp'];?></div><br>
       
       
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?messageId=".$messageId; ?>" method="post">
       <div class="form-group">
            <label>Text: <br></label>
            <input type="text" name="replay" class="form-control">
            <span class="invalid-feedback"></span>
        
        <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Send">
            </div>
            </form>
    <br>
    <a href="welcome.php">Main page</a>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>