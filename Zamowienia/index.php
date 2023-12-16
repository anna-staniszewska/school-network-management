<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sieć Szkół</title>
    </head>
    <body>
    <header>
        <?php
            if(isset($_SESSION["error"])) {
                echo $_SESSION["error"];
            }
                ?>
    </header>
    <div class="main">
        <h1>LOGOWANIE</h1>
            <form action="includes/login.php" method="post">
                <label><h2>Zaloguj się na konto</h2></label>
                <br>
                <input type="text" name="userName" placeholder="login">
                <br>
                <input type="text" name="password" placeholder="hasło" autocomplete="off" style="-webkit-text-security: disc">
                <br>
                <button type = "submit" name = "submit">Submit</button>
            </form>
    </div>
    </body>
</html>