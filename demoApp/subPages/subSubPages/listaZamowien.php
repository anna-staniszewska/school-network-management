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

    //header("location: ../includes/orders.php");

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
            <div>
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
                    <div>
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

</ul>
</body>
</html>
