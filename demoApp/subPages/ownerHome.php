<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home Właściciela</title>
    </head>
    <body>
    <header>
        <p>Cześć <?php
            echo $_SESSION["Imie"];
            ?>
        </p>
        <a href="../includes/logout.php">Wyloguj</a>
    </header>
        <div class="main">
            <div id="nav">
                <ul class="menu">
                    <li><a href="subSubPages/harmonogramWlasciciel.php">Harmonogram rekrutacji</a></li>
                    <li><a href="subSubPages/zamowieniaWlasciciel.php">Zamównia produktów</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>