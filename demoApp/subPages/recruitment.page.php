<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekrutacja</title>
    <link rel="stylesheet" type="text/css" href="../css/recruitment.css">
    <link rel="shortcut icon" href="../css/logo.jpg">

    <style>
        .hidden{
            display: none;
        }
    </style>
</head>
<body>
<header>
    <div class="headerContainer">
        <div id="logo">
            <img src="../css/logo.jpg" width=150px>
        </div>

        <h1>Harmonogram</h1>

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

    <footer>&copy; 2023 Sieć szkół</footer>
    <a class="button" id="logout" href="../includes/logout.inc.php">Wyloguj</a>
    <?php
    if($_SESSION["Stanowisko"]=="wlasciciel") {
        echo '<a class="button" href="./ownerHome.page.php">HOME</a>';
    }
    ?>



</header>
<main>
    <a href="../includes/inputNewInterview.inc.php">Dodaj rozmowę</a><br>
    <?php
    $today = date("w", strtotime($_SESSION["data"]));
    if($today==0) $today = 7;
    for ($a=0;$a<7;$a++){
        $days[$a] = date('Y-m-d',strtotime(-($today-($a+1))." day", strtotime($_SESSION["data"])));
    }
    ?>

    <form action="../includes/schedule.inc.php" method="get">
        <button type="submit" name="previous"><span>&#171;</span> Poprzedni tydzień</button>
        <button type="submit" name="next">Następny tydzień <span>&#187;</span></button>
    </form>

    <table> <br>
        <tr>
            <th> Godzina </th>
            <?php
            for($a=0;$a<7;$a++) echo "<th>$days[$a]</th>";
            ?>
        </tr>
        <tr>
            <th></th> <!--godziny-->
            <?php
            $row = $_SESSION["spotkania"];
            for($i=0; $i < 7; $i++) {
                echo "<td>";
                for ($j = 0; $j < count($row); $j++) {
                    if ($days[$i] == $row[$j]["Data"]) {
                        echo "<div>";
                        echo $row[$j]['GodzinaRozpoczecia'] . ' - ' . $row[$j]['GodzinaZakonczenia'] . '<br>';
                        echo $row[$j]['Imie'] . ' ' . $row[$j]['Nazwisko'] . '<br>';
                        echo $row[$j]['Stanowisko'] . '<br>';
                        echo $row[$j]['IdSali'] . '<br>';

                        echo '<form action="../includes/modifyMeeting.inc.php" method="post">';
                        echo '<input class="hidden" type="number" name="IdRozmowy" value="' . $row[$j]['IdRozmowy'] . '">';
                        echo '<button type="submit" name="submitId">Modyfikuj</button>';
                        echo '</form>';

                        if($_SESSION["Stanowisko"]=="wlasciciel") {
                            echo "Szkoła nr " . $row[$j]['IdSzkoly'];
                        }
                        echo "</div>";
                    }
                }
                echo "</td>";
            }
            ?>
        </tr>
    </table>
</main>
</body>
</html>