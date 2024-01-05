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
</head>
<body>
<header>
    <p>Cześć <?php echo $_SESSION["Imie"]; ?>
    </p>
    <a href="../includes/logout.inc.php">Wyloguj</a>
</header>
<div class="main">
    <h1> Harmonogram </h1> <br>
    <?php
        $today = date("w", strtotime($_SESSION["data"]));
        if($today==0) $today = 7;
        for ($a=0;$a<7;$a++){
            $days[$a] = date('Y-m-d',strtotime(-($today-($a+1))." day", strtotime($_SESSION["data"])));
        }
    ?>

    <form action="../includes/schedule.inc.php" method="get">
        <button type="submit" name="previous">Poprzedni tydzień</button>
        <button type="submit" name="next">Następny tydzień</button>
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
                        echo $row[$j]['IdSali'];
                        echo "</div>";
                    }
                }
                echo "</td>";
            }
            ?>
        </tr>
    </table>
    <hr>
</div>
</body>
</html>