<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista Zamównień</title>
</head>
<body>
<header>
    <p>Cześć <?php
        echo $_SESSION["Imie"];
        ?>
    </p>
    <a href="../../includes/logout.php">Wyloguj</a>
</header>
<div class="main">
    <p>oto zamównień lista</p>
</div>
</body>
</html>