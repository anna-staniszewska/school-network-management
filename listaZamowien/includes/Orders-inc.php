<?php

include "../classes/dbh.class.php";
include "../classes/Orders.class.php";
include "../classes/OrdersController.class.php";

$orders=new OrdersController($_SESSION["Stanowisko"], $_SESSION["IdSzkoly"]);
$orders->getOrders();
header("location: ../index.php");

?>