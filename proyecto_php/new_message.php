<?php
require "config.php";
require "session.php";
session_start();
check_session();
// require "header.php";
// identificacion();
$userId = $_SESSION['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['receiver'])) {
            $receiver = $_POST['receiver'];
            $message = htmlspecialchars($_POST['text']);
            $subject = $_POST['subject'];
            $currentDate = date('Y-m-d H:i:s');


            $query2 = "INSERT INTO messages VALUES (null, '$userId', '$receiver', '$subject', '$message', '$currentDate', 0)";
            $result = mysqli_query($link, $query2);
            // echo "Message sent, redirectin to the inbox page in 4 second";
            sleep(3);
            header("location: welcome.php");
        }
    }


?>

<head>
    <meta charset="UTF-8">
    <title>New Message</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
        }
    </style>
</head>

<body>
<div style="color: red; position: absolute; right: 0px"><?php echo $_SESSION["email"]?></div>
    <div class="wrapper">
        <h2>Message</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>To:</label>
                <!-- <input type="list" name="emailToUser" class="form-control"> -->

                <span class="invalid-feedback"></span>

                <select name="receiver">
                    <?php
                    $sql = "SELECT email, userId
                         from users";
                    $result = mysqli_query($link, $sql);
                    while ($mostrar = mysqli_fetch_array($result)) {
                        $codUser = $mostrar['userId'];
                        $alias = $mostrar['email'];
                        $cod = $mostrat['userId'];

                        if ($cod != $_SESSION['id']) {
                            echo "<option value='$codUser'>$alias</option>";
                        }
                    }

                    ?>
                </select>
                <?php
                // var_dump($result);

                // while ($mostrar = mysqli_fetch_array($result)) {
                //     echo $mostrar['email'] . " ";
                //     echo $mostrar['userId'] . "<br>";
                // }

                ?>
            </div>
            <div class="form-group">
                <label>Subject:</label>
                <input type="text" name="subject" class="form-control">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label>Text</label>
                <input type="text" name="text" class="form-control">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Send">
            </div>
        </form>
    </div>
</body>

</html>