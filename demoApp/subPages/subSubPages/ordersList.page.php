<?php
session_start();
//include 'includes/class-autoload.inc.php';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../css/ordersList.css">
    <title>Zamowienia</title>
</head>
<body>

<header>
    <div class="headerContainer">
        <div id="logo">
            <img src="../../css/logo.jpg" width=150px>
        </div>

    <div id="welcome">
        <h1>Cześć, <?php
            echo $_SESSION["Imie"];
            ?>!
        </h1>
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

  <a href="../../includes/logout.inc.php">Wyloguj</a>

  </header>

<main>
<h2>Zamówienia</h2>
    <?php

    //header("location: ../includes/orders.inc.php");

    //$zamowieniaObj = new Zamowienia();
    //$zamowieniaObj -> getZamowienia();
    $i=0;
    $j=0;
    $currentDate=Null;
    $currentIdSzkoly=Null;
    $currentIdZamowienia=Null;


    while($i < count($_SESSION["rowOrders"])) {

        if($_SESSION["rowOrders"][$i]['Data']!=$currentIdZamowienia){
            ?>
            <div id="wiersz">
                <?php
                echo 'ID Zamówienia: ' . $_SESSION["rowOrders"][$i]['IdZamowienia'] . ' ' . 'ID Szkoły: ' .
                    $_SESSION["rowOrders"][$i]['IdSzkoly'] . ' ' . 'Szkoła: ' . $_SESSION["rowOrders"][$i]['Nazwa'] .
                    ' ' . 'Data: ' . $_SESSION["rowOrders"][$i]['Data'] . ' ' . 'Stan zamówienia: ' . $_SESSION["rowOrders"][$i]['Stan'] .
                    ' ' . 'Komentarz: ' . $_SESSION["rowOrders"][$i]['Komentarz'] . ' ' . 'Dostarczony: ' . $_SESSION["rowOrders"][$i]['Dostarczony'] .
                    ' ' . '<br>';
               ?>
            </div>
           <?php
            $currentDate = $_SESSION["rowOrders"][$i]['Data'];
            $currentIdSzkoly = $_SESSION["rowOrders"][$i]['IdSzkoly'];
            $currentIdZamowienia=$_SESSION["rowOrders"][$i]['IdZamowienia'];
            while($j < count($_SESSION["rowProducts"]) && $_SESSION["rowProducts"][$j]['IdZamowienia'] === $currentIdZamowienia){
                    ?>
                    <div id="produkt">
                        <?php
                        echo 'Nazwa produktu: ' . $_SESSION["rowProducts"][$j]['Nazwa'] . ' ' . 'Ilość: ' .
                            $_SESSION["rowProducts"][$j]['Ilosc'] . ' ' . 'Cena netto: ' . $_SESSION["rowProducts"][$j]['CenaNetto'] .
                            ' ' . 'Cena brutto: ' . $_SESSION["rowProducts"][$j]['CenaBrutto'] . ' ' . 'VAT: ' .
                            $_SESSION["rowProducts"][$j]['VAT'] . ' %'. '<br>';
                       ?>
                    </div>
                    <?php
                $j++;
            }
        }
        $i++;

    }
    ?>

</main>

<footer>&copy; 2023 Sieć szkół</footer>
</body>
</html>
