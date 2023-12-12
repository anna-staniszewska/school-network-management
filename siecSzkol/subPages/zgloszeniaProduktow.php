<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Zgłoszenia produktów</title>
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

        </div>
            <div class="main">
                <h1>Wprowadzanie danych</h1>
                <form action="../includes/inputProduct.php" method="post">
                        <label><h2>Zgłoś brakujące produkty w Twoim miejscu pracy:</h2></label>
                        <br>
                        <input type="text" name="product" placeholder="wpisz nazwę produktu">
                        <br>
                        <button type = "submit" name = "submit">Zgłoś</button>
                </form>
            </div>
    </body>
</html>