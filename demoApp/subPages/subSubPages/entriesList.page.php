<?php
    session_start();
    //$_SESSION["IdSzkoly"] = 1;
    //Co jeszcze bym chciał dodać:
    // - przycisk do odświeżenia tabeli (jeśli będąc na stronie zgłoszonych produktów doda się w bazie rekordy lub zmieni ich status zatwierdzenia, tabela nie wyświetli ich, gdyż nie aktualizuje się automatycznie; trzeba ponownie wejść na EntriesModel.php)
    // - komunikaty po wciśnięciu przycisku gdy:
    //    + nie zaznaczono żadnego zgłoszenia
    //    + brak zgłoszeń do wyświetlenia
    // - wybór sposobu sortowania (po dacie/nazwie, rosnąco/malejąco)
    // - scroll??
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, inital-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../../css/entriesList.css">
  <title>Zgłoszone produkty</title>
  <link rel="shortcut icon" href="../../css/logo.jpg">
</head>
<body>

<header>
  <div class="headerContainer">
      <div id="logo">
          <img src="../../css/logo.jpg" width=150px>
      </div>

  <!--  <div id="welcome">
      <h1>Cześć, <?php
    //      echo $_SESSION["Imie"];
          ?>!
      </h1>
  </div>  -->

    <h1>Zgłoszone produkty</h1>

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
<a class="button" id="logout" href="../../includes/logout.inc.php">Wyloguj</a>
<a class="button" href="../secretariatHome.page.php">HOME</a>

</header>

<main>

    <?php
    if(isset($_SESSION["IdSzkoly"]))
    {
    ?>
        <form action="../../includes/deleteEntries.inc.php" method="post">
          <div id = "changeTable">
            <table id="tab">

                <th>Data zgłoszenia</th>
                <th>Nazwa produktu</th>
                <th>Dodano do zamówienia</th>
            </table>
          </div>
        <!--    <div id="delete">
                <button class="button" type="submit" name="delete">Usuń wybrane produkty</button>
            </div> -->

            <input class="button" type="submit" name="delete" value="Usuń wybrane produkty">
        </form>
        <script>
            newRow();

            function newRow() {
                let html ="";
                let row;
                <?php
                $z = $_SESSION["zgloszenia"];
                for ($i=0; $i < count($z); $i++) {
                if($z[$i]["Zweryfikowano"]==0) {
                ?>
                html += `<tr>`;
                html += `<td><?php echo $z[$i]["Data"] ?></td>`;
                html += `<td><?php echo $z[$i]["Nazwa"] ?></td>`;
                html += `<td><input type="checkbox" name="products[]" value="<?php echo $z[$i]["IdZgloszenia"] ?>"></td>`;
                html += `</tr>`;

                row = document.getElementById("tab").insertRow();
                row.innerHTML = html;

                html="";
                <?php
                }
                }
                ?>
            }
        </script>
        </main>
    <?php
    }
    ?>

</body>
</html>
