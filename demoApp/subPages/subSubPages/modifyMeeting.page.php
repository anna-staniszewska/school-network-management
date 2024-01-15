<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modyfikacja spotkania</title>
    <link rel="shortcut icon" href="../../css/logo.jpg">
    <link rel="stylesheet" type="text/css" href="../../css/modifyMeeting.css">
</head>

<body>
<header>
    <div class="headerContainer">
        <div id="logo">
            <img src="../../css/logo.jpg" width=150px>
        </div>

        <h1>Modyfikacja spotkania</h1>

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

                <script>document.write("Dzisiaj jest        " + getDateStr())</script>
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

    <a class="button" id="logout" href="../includes/logout.inc.php">Wyloguj</a>
</header>


<main>
    <div id="meetingInfo">
        <?php
        /*IdRozmowy: <?php echo $_SESSION["IdRozmowy"]; ?>*/
        echo "<div id='candidate'>";
        $meetingInformations = $_SESSION["spotkanie"][0];
        echo "<h3>Inforamcje o kandydacie</h3>";
        echo "Imie: " . $meetingInformations["Imie"] . "<br>";
        echo "Nazwisko: " . $meetingInformations["Nazwisko"] . "<br>";
        echo "Satnowisko: " . $meetingInformations["Stanowisko"] . "<br>";
        echo "Data urodzenia: " . $meetingInformations["DataUrodzenia"] . "<br>";
        echo "Nr. telefonu: " . $meetingInformations["NrTelefonu"] . "<br>";
        echo "E-mail: " . $meetingInformations["Email"] . "<br>";
        echo "Miejscowosc: " . $meetingInformations["Miejscowosc"] . "<br>";
        echo "Ulica: " . $meetingInformations["Ulica"] . "<br>";
        echo "Nr. budynku: " . $meetingInformations["NrBudynku"] . "<br>";
        if ($meetingInformations["NrLokalu"] != null) {
            echo "Nr. lokalu: " . $meetingInformations["NrLokalu"] . "<br>";
        }
        echo "Pesel: " . $meetingInformations["Pesel"] . "<br>";
        echo "</div>";

        echo "<div id='meeting'>";
        echo "<h3>Informacje o spotkaniu</h3>";
        echo "Godzina rozpoczęcia: " . $meetingInformations["GodzinaRozpoczecia"] . "<br>";
        echo "Godzina zakończenia: " . $meetingInformations["GodzinaZakonczenia"] . "<br>";
        echo "Data spotkania: " . $meetingInformations["DataRozmowy"] . "<br>";
        echo "Nr. sali: " . $meetingInformations["IdSali"] . "<br>";
        echo "</div>";
        ?>
    </div>
    <br><br>
    <h2>Zmodyfikuj spotkanie</h2>
    <br>
    <form action="../../includes/modifyMeeting.inc.php" method="POST">
        <div id="modifyForm">
            <label>Nr. sali:</label>
            <br>
            <input type="text" name="roomId" placeholder="Nr. sali" minlength="1" maxlength="12"  required>
            <br>
            <label>Godzina rozpoczęcia:</label>
            <br>
            <input type="time" name="startTime" placeholder="godzina rozpoczęcia" minlength="5" maxlength="5" required>
            <br>
            <label>Godzina zakończenia:</label>
            <br>
            <input type="time" name="endTime" placeholder="godzina zakończenia" minlength="5" maxlength="5" required>
            <br>
            <label>Data spotkania</label>
            <br>
            <input type="date" name="meetingDate"  placeholder="dd-mm-yyyy" onclick="hide()" required>
            <br>
        </div>
        <button id="modifyButton" type="submit" name="submitModify">Modyfikuj</button>
    </form>

    <form action="../../includes/modifyMeeting.inc.php" method="POST">
        <button type="submit" name="submitDelete">Usuń spotkanie</button>
        <a href="../recruitment.page.php">Anuluj</a>
    </form>

    


</main>

<footer>&copy; 2023 Sieć szkół</footer>
</body>
