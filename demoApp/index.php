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
        <link rel="stylesheet" type="text/css" href="./css/index.css">
    </head>
    <body>
        <p id="zegar"></p>
        <script>
            setInterval(myTimer, 1000);
            function myTimer(){
                const date = new Date();
                document.getElementById("zegar").innerHTML = date.toLocaleTimeString();
            }
        </script>

        <div>
            <header>
                <h1>LOGOWANIE</h1>
            </header>

            <main>
                <form action="includes/login.php" method="post">
                    <label>Wpisz nazwę użytkownika</label>
                    <br>
                    <input type="text" name="userName" placeholder="login" onclick="hide()">
                    <br><br>
                    <label>Wpisz hasło</label>
                    <br>
                    <input type="text" name="password" placeholder="hasło" autocomplete="off" style="-webkit-text-security: disc"  onclick="hide()">
                    <br><br>
                    <p id="error">
                        <?php
                            if(isset($_SESSION["error"])) {
                                echo $_SESSION["error"];
                            }
                        ?>
                    </p>

                    <script>
                        function hide(){
                            document.getElementById("error").style.display="none";
                        }
                    </script>

                    <button type = "submit" name = "submit">Zaloguj się</button>
                </form>
            </main>
        </div>
    </body>
</html>