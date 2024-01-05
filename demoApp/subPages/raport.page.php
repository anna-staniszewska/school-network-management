<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raport VAT</title>
</head>
<body>
    <header>
        <p>Cześć <?php
            echo $_SESSION["Imie"];
            ?>
        </p>
        <a href="../includes/logout.inc.php">Wyloguj</a>
    </header>
<div class="main">
    <p>Strona księgowej</p>
</div>
</body>
</html>