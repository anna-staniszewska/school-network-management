<?php

if (isset($_POST["addOrder"])) {

    $order = $_POST;

    include "../classes/Database.php";
    include "../classes/MakeOrderModel.php";
    include "../classes/MakeOrderController.php";

    $inputOrder = new \classes\MakeOrderController($order);

    if ($inputOrder->makeCompleteOrder()) {
        header("location: ../subPages/subSubPages/Feedbacks/createOrderAccept.page.php");
    } else {
        header("location: ../subPages/subSubPages/Feedbacks/createOrderDeny.page.php? {$inputOrder->printError()}");
    }

}
