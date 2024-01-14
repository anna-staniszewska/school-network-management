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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
            <td>
                <?php
                    $hours = array();
                    $hoursNumbers = array();
                    for($a=7;$a<21;$a+=0.5){
                        $hoursNumbers[] = $a;
                    }
                    
                    for($a=7;$a<21;$a++){
                        echo "<div class='hour'>$a:00</div>";
                        if ($a < 10){
                            $hours[] = '0' . $a . ':00';
                            $hours[] = '0' . $a . ':30';
                        }
                        else{
                            $hours[] = $a . ':00';
                            $hours[] = $a . ':30';
                        }
                    };
                ?>
            </td> 
            <script>
                const tops = [];
                const lefts = [];
            </script>
            <?php
            $row = $_SESSION["spotkania"];
            for($i=0; $i < 7; $i++) {
                echo "<td>";
                $meetingsStarts = array();
                $meetingsEnds = array();
                $l = 0;
                for ($j = 0; $j < count($row); $j++) {
                    if ($days[$i] == $row[$j]["Data"]) {
                        $startHour = $row[$j]['GodzinaRozpoczecia'];
                        $endHour = $row[$j]['GodzinaZakonczenia'];
                        echo "<div class='meeting'>";
                        echo $startHour . ' - ' . $endHour . '<br>';
                        echo $row[$j]['Imie'] . ' ' . $row[$j]['Nazwisko'] . '<br>';
                        echo $row[$j]['Stanowisko'] . '<br>';
                        echo $row[$j]['IdSali'] . '<br>';

                        if($_SESSION["Stanowisko"]=="wlasciciel") {
                            echo "Szkoła nr " . $row[$j]['IdSzkoly'];
                        }

                        echo '<form action="../includes/modifyMeeting.inc.php" method="post">';
                        echo '<input class="hidden" type="number" name="IdRozmowy" value="' . $row[$j]['IdRozmowy'] . '">';
                        echo '<button class="modify" type="submit" name="submitId">Modyfikuj</button>';
                        echo '</form>';

                        echo "</div>";

                        for($a=0;$a<28;$a++){
                            if($startHour == $hours[$a]){
                                $meetingsStarts[$l] = $hoursNumbers[$a]; 
                            }
                        }
                        for($a=0;$a<28;$a++){
                            if($endHour == $hours[$a]){
                                $meetingsEnds[$l] = $hoursNumbers[$a]; 
                            }
                        }
                        $currStart = $meetingsStarts[$l];
                        $currEnd = $meetingsEnds[$l];
                        $l++;

                        if($l > 0){
                            $k = 0;
                            for($a=0;$a<count($meetingsEnds);$a++){
                                if(($currStart <= $meetingsStarts[$a] && $meetingsStarts[$a] < $currEnd) || ($currStart < $meetingsEnds[$a] && $meetingsEnds[$a] <= $currEnd)){
                                    $k += 200;  
                                    ?>
                                    <script>
                                        lefts.push(<?php echo $k?>);
                                    </script>
                                    <?php
                                }
                            }
                        }
                        for($a=0;$a<28;$a++){
                            if($startHour == $hours[$a]){
                                ?>
                                <script>
                                    tops.push(<?php echo $a * 100?>);
                                </script>
                                <?php
                            }
                        }
                    }
                }
                echo "</td>";
            }
            ?>
            <script>
                $(document).ready(function(){
                    var t = 0
                    $('.meeting').each(function(){
                        $(this).css('top', tops[t]+'px');
                        /* $(this).css('left', lefs[t]+'px'); */
                        t++;
                    });
                });
            </script>
        </tr>
    </table>
</main>
</body>
</html>