<?php

include "../classes/Database.php";
include "../classes/Orders.php";
include "../classes/OrdersController.php";

$orders = new OrdersController($_SESSION["Stanowisko"], $_SESSION["IdSzkoly"]);
$orders->getOrders();
//echo jestem;
header("location: ../subPages/subSubPages/listaZamowien.php");
//header("location: /orders.php");
?>