<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Odrzucono</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../../../css/createOrderValidation.css">
        <link rel="shortcut icon" href="../../../css/logo.jpg">
    </head>


    <body>
        <header>
            <img src="../../../css/logo.jpg" width=150px>
            <div id="home">
                <a href="../../secretariatHome.page.php">HOME</a>
            </div>
        </header>

        <footer>&copy; 2023 Sieć szkół</footer>

        <h1>Nie udało się złożyć zamówienia!</h1>

        <div id="newOrder">
            <a href="../newOrder.page.php">Złóż następne zamówienie</a>
        </div>
    </body>
</html>