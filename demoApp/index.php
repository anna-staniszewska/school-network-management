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
        <link rel="shortcut icon" href="./css/logo.jpg">
    </head>
    <body>
        <header>
            <div id="logo">
                <img src="./css/logo.jpg" width=150px>
            </div>

            <div id="zegar">
                <p id="data">
                    <script language="JavaScript">
                        DayName = new Array(7)
                        DayName[0] = "niedziela"
                        DayName[1] = "poniedziałek"
                        DayName[2] = "wtorek"
                        DayName[3] = "środa"
                        DayName[4] = "czwartek"
                        DayName[5] = "piątek"
                        DayName[6] = "sobota"

                        MonthName = new Array(12)
                        MonthName[0] = "stycznia"
                        MonthName[1] = "lutego"
                        MonthName[2] = "marca"
                        MonthName[3] = "kwietnia"
                        MonthName[4] = "maja"
                        MonthName[5] = "czerwca"
                        MonthName[6] = "lipca"
                        MonthName[7] = "sierpnia"
                        MonthName[8] = "września"
                        MonthName[9] = "października"
                        MonthName[10] = "listopada"
                        MonthName[11] = "grudnia"

                        function getDateStr(){
                            var Today = new Date()
                            var WeekDay = Today.getDay()
                            var Month = Today.getMonth()
                            var Day = Today.getDate()
                            var Year = Today.getFullYear()

                            if(Year <= 99)
                                Year += 1900

                            return DayName[WeekDay] + "," + " " + Day + " " + MonthName[Month] + " " + Year
                        }
                    </script>

                    <script>document.write("Dzisiaj jest " + getDateStr())</script>
                </p>

                <p id="czas"></p>
                <script>
                    setInterval(myTimer, 1000);

                    function myTimer(){
                        const date = new Date();
                        document.getElementById("czas").innerHTML = date.toLocaleTimeString();
                    }
                </script>
            </div>
        </header>

        <div id="main">
            <h1>LOGOWANIE</h1>

            <main>
                <form action="includes/login.inc.php" method="post">
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
