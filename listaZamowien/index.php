<?php
session_start();  
    //include 'includes/class-autoload.inc.php';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zamowienia</title>
</head>
<body>
    <h1>Zamówienia</h1>
    <ul>
        
    <?php
        //$zamowieniaObj = new Zamowienia();
        //$zamowieniaObj -> getZamowienia();
        $i=0;
        $j=0;
        $previousDate=Null;
        $previousIdSzkoly=Null;
        $previousIdZamowienia=Null;

        while($i < count($_SESSION["rowOrders"])) {
            if($_SESSION["rowOrders"][$i]['Data']!=$previousDate || $_SESSION["rowOrders"][$i]['IdSzkoly']!=$previousIdSzkoly){
              ?> 
              <div>
                <?php
                    echo 'ID Zamówienia: ' . $_SESSION["rowOrders"][$i]['IdZamowienia'] . ' ' . 'ID Szkoły: ' . $_SESSION["rowOrders"][$i]['IdSzkoly'] . ' ' . 'Szkoła: ' . $_SESSION["rowOrders"][$i]['Nazwa'] . ' ' . 'Data: ' . $_SESSION["rowOrders"][$i]['Data'] . ' ' . 'Stan zamówienia: ' . $_SESSION["rowOrders"][$i]['Stan'] . ' ' . 'Komentarz: ' . $_SESSION["rowOrders"][$i]['Komentarz'] . ' ' . 'Dostarczony: ' . $_SESSION["rowOrders"][$i]['Dostarczony'] . ' ' . '<br>';
                ?>
              </div>
              <?php
              $previousDate = $_SESSION["rowOrders"][$i]['Data'];
              $previousIdSzkoly = $_SESSION["rowOrders"][$i]['IdSzkoly'];
              $previousIdZamowienia=$_SESSION["rowOrders"][$i]['IdZamowienia'];
              $i++;
              while($j < count($_SESSION["rowProducts"]) && $_SESSION["rowProducts"][$j]['IdZamowienia'] === $previousIdZamowienia){
                if($_SESSION["rowProducts"][$j]['IdZamowienia']==$previousIdZamowienia){
                ?>
                <div>
                    <?php
                    echo 'Nazwa produktu: ' . $_SESSION["rowProducts"][$j]['Nazwa'] . ' ' . 'Ilość: ' . $_SESSION["rowProducts"][$j]['Ilosc'] . ' ' . 'Cena netto: ' . $_SESSION["rowProducts"][$j]['CenaNetto'] . ' ' . 'Cena brutto: ' . $_SESSION["rowProducts"][$j]['CenaBrutto'] . ' ' . 'VAT: ' .
                    $_SESSION["rowProducts"][$j]['VAT'] . ' '. '<br>';
                    $j++;
                    ?>
                </div>
                <?php
                }
              }
          }
          }
    ?>

    </ul>
</body>
</html>
