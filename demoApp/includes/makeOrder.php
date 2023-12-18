<?php

if (isset($_POST["addOrder"])) {

    $order = $_POST;

    include "../classes/Database.php";
    include "../classes/MakeOrderModel.php";
    include "../classes/MakeOrderController.php";

    $inputOrder = new \classes\MakeOrderController($order);

    if ($inputOrder->makeCompleteOrder()) {
        header("location: ../subPages/subSubPages/Feedbacks/utworzZamowieniePotwierdzenie.php");
    } else {
        header("location: ../subPages/subSubPages/Feedbacks/utworzZamowienieOdrzucenie.php? {$inputOrder->printError()}");
    }

}
