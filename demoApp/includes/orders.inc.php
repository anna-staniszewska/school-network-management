<?php

include "../classes/Database.php";
include "../classes/OrdersModel.php";
include "../classes/OrdersController.php";


$orders = new OrdersController($_SESSION["Stanowisko"], $_SESSION["IdSzkoly"]);
$orders->getOrders();

header("location: ../subPages/subSubPages/ordersList.page.php");
//header("location: /orders.inc.php");
?>