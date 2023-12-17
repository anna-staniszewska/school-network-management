<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Zgłoszenia produktów</title>
        <link rel="stylesheet" type="text/css" href="../css/inputProducts.css">
    </head>

    <body>
        <header>
            <div id="logo">
                <img src="../css/logo.jpg" width=100px>
            </div>

            <div id="welcome">
                <h1>Cześć, <?php
                    echo $_SESSION["Imie"];
                    ?>!
                </h1>

            </div>

            <div id="clockLogOut">
                <p id="zegar"></p>
                <a href="../includes/logout.php">Wyloguj</a>
            </div>
            <script>
                setInterval(myTimer, 1000);
                function myTimer(){
                    const date = new Date();
                    document.getElementById("zegar").innerHTML = date.toLocaleTimeString();
                }
            </script>

            
        </header>

        <main>
            <h2>Zgłoś brakujące produkty w Twoim miejscu pracy:</h2>
            <form action="../includes/inputProduct.php" method="post">
                    <label>Wpisz nazwę produktu</label>
                    <br>
                    <input type="text" name="product" placeholder="nazwa produktu" onclick="hide()">
                    <br>

                    <p id="feedback">
                        <?php
                            if(isset($_SESSION["feedbackInputProduct"])) {
                                echo $_SESSION["feedbackInputProduct"];
                            }
                        ?>
                    </p>

                    <button type = "submit" name = "submit">Zgłoś</button>
            </form>


            <script>
                function hide(){
                    document.getElementById("feedback").style.display="none";
                }
            </script>

        </main>

        <footer>&copy; 2023 Sieć szkół</footer>
    </body>
</html>