<?php

include "../classes/Database.php";
include "../classes/OrdersModel.php";
include "../classes/OrdersModelController.php";


$orders = new OrdersModelController($_SESSION["Stanowisko"], $_SESSION["IdSzkoly"]);
$orders->getOrders();

header("location: ../subPages/subSubPages/ordersList.php");
//header("location: /orders.php");
?>