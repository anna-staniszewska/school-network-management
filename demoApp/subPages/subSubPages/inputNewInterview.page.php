<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dodanie rozmowy</title>
        <link rel="stylesheet" type="text/css" href="../../css/inputNewInterview.css">
        <link rel="shortcut icon" href="../../css/logo.jpg">
    </head>

    <body>
        <header>
            <div class="headerContainer">
                <div id="logo">
                    <img src="../../css/logo.jpg" width=150px>
                </div>

                <h1>Nowe spotkanie</h1>
                
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
            </div>

            <a href="../../includes/logout.inc.php">Wyloguj</a>
        </header>

        <main>
          <?php
            //for ($i=0; $i < count($_SESSION["sale"]); $i++) {
            //  echo $_SESSION["sale"][$i]["IdSali"];
            //}
           ?>
            <h2>Dodaj nową rozmowę:</h2>
            <form action="../../includes/newCandidateAndInterview.inc.php" method="post">
                <div id="formInput">
                    <div id="candidate">
                        <b>Kandydat</b><br>
                        <label>Wpisz imię kandydata</label>
                        <br>
                        <input type="text" name="name" placeholder="imie kandydata" onclick="hide()">
                        <br>
                        <label>Wpisz nazwisko kandydata</label>
                        <br>
                        <input type="text" name="surname" placeholder="nazwisko kandydata">
                        <br>
                        <label>Wpisz datę urodzenia kandydata</label>
                        <br>
                        <input type="date" name="birthDate">
                        <br>
                        <label>Wpisz email kandydata</label>
                        <br>
                        <input type="text" name="email">
                        <br>
                        <label>Wpisz ulicę kandydata</label>
                        <br>
                        <input type="text" name="street">
                        <br>
                        <label>Numer budynku</label>
                        <br>
                        <input type="text" name="building">
                        <br>
                        <label>Numer mieszkania</label>
                        <br>
                        <input type="text" name="flat">
                        <br>
                        <label>Miejscowość</label>
                        <br>
                        <input type="text" name="city">
                        <br>
                        <label>Numer telefonu</label>
                        <br>
                        <input type="text" name="phoneNumber">
                        <br>
                        <label>PESEL</label>
                        <br>
                        <input type="text" name="PESEL">
                        <br>
                        <label>Stanowisko</label>
                        <br>
                        <input type="text" name="job">
                        <br><br>
                    </div>

                    <div id="meeting">
                        <b>Rozmowa</b><br>
                        <label>Data rozmowy</label>
                        <br>
                        <input type="date" name="interviewDate">
                        <br>
                        <label>Godzina rozpoczęcia</label>
                        <br>
                        <input type="time" name="interviewStartTime">
                        <br>
                        <label>Godzina zakończenia</label>
                        <br>
                        <input type="time" name="interviewStopTime">
                        <br>
                        <label>Wybierz salę</label>
                        <br>
                        <select name="room">
                        <?php
                            for ($i=0; $i < count($_SESSION["sale"]); $i++) {
                            echo '<option value="' . $_SESSION["sale"][$i]["IdSali"] . '">' . $_SESSION["sale"][$i]["IdSali"] . '</option>';
                            }
                        ?>
                        </select>
                        <br>
                    </div>
                </div>

                <p id="feedback">
                    <?php
                        if(isset($_SESSION["feedbackInputProduct"])) {
                            echo $_SESSION["feedbackInputProduct"];
                        }
                    ?>
                </p>
                
                <div id="formButtons">
                    <button class="formButton" type = "submit" name = "addInterview">Zgłoś</button>
                    <a class="formButton" href="../recruitment.page.php">Anuluj</a>
                </div>
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
