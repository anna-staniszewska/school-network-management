<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Sekretariatu</title>
</head>
<body>
    <header>
        <?php
        session_start();
        ?>
        <p>Cześć <?php
            echo $_SESSION["Imie"];
            ?>
        </p>
    </header>
    <div class="main">
        <div id="nav">
            <ul class="menu">
                <li><a href="subSubPages/listaZgloszen.php">Zgłoszenia pracowników</a></li>
                <li><a href="subSubPages/utworzZamowienie.php">Nowe zamówienie</a></li>
                <li><a href="subSubPages/listaZamowien.php">Lista zamównień</a></li>
            </ul>
        </div>
    </div>
</body>
</html>