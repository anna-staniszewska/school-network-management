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
    <title>Lista zamówień</title>
    <link rel="shortcut icon" href="../../css/logo.jpg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // $(document).ready(function (){
        //     $("#delivery").click(function() {
        //         $(this).css('background-color', 'red');
        //     });
        // });
        document.getElementById('delivery').addEventListener('click', function onClick(){
            document.getElementById('delivery').style.backgroundColor='red';
        })
        <!--                --><?php //echo $_SESSION["buttonColor"]; ?>
    </script>
</head>
<body>

<header>
    <div class="headerContainer">
        <div id="logo">
            <img src="../../css/logo.jpg" width=150px>
        </div>

        <h1>Lista Zamówień</h1>

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


  <?php
        if($_SESSION["Stanowisko"]=="wlasciciel") {
            echo '<a class="button" href="../ownerHome.page.php">HOME</a>';
        }
        elseif($_SESSION["Stanowisko"]=="pracownikSekretariatu") {
            echo '<a class="button" href="../secretariatHome.page.php">HOME</a>';
        }
    ?>

</header>

<main>


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
                echo 'ID Zamówienia: ' . $_SESSION["rowOrders"][$i]['IdZamowienia'] . ' ' .
                'ID Szkoły: ' . $_SESSION["rowOrders"][$i]['IdSzkoly'] . ' ' .
                'Szkoła: ' . $_SESSION["rowOrders"][$i]['Nazwa'] . ' ' .
                'Data: ' . $_SESSION["rowOrders"][$i]['Data'] . ' ' .
                'Stan zamówienia: ' . $_SESSION["rowOrders"][$i]['Stan'] . ' ' .
                'Komentarz: ' . $_SESSION["rowOrders"][$i]['Komentarz'] . ' ' .
                'Dostarczony: ' . $_SESSION["rowOrders"][$i]['Dostarczony'] . ' ' . '<br>';
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
            if($_SESSION["Stanowisko"]=="specjalistaDsDostaw" && $_SESSION["rowOrders"][$i]['Stan'] === "Zaakceptowano" ){
                ?>
                    <form id="form" action="../../includes/acceptReject.inc.php" method="post">
                        <input type="hidden" name="checkbox" value="<?php echo $currentIdZamowienia; ?>">
                        <input id="delivery" type="submit" name="submit" value="dostarczone">
                    </form>

                <?php
            }
        }
        $i++;
        if($_SESSION["Stanowisko"]=="pracownikDzialuZakupow"){
            ?>
            <div id="przycisk">
                <form action="../../includes/acceptReject.inc.php" method="post">
                    <textarea id="komentarz" name="komentarz" placeholder="wpisz komentarz" rows="4" cols="50" maxlength="250"></textarea>
                    <input type="hidden" name="orderId" value="<?php echo $currentIdZamowienia; ?>">
                    <button id="accept" type="submit" name="action" value="accept">Akceptuj zamówienie</button>
                    <button id="reject" type="submit" name="action" value="reject">Odrzuć zamówienie</button>
                </form>
            <?php
        }
    }
    ?>

</main>

</body>
</html>
