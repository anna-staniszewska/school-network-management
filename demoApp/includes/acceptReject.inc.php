<?php

include "../classes/Database.php";
include "../classes/AcceptRejectModel.php";
include "../classes/AcceptRejectController.php";
include "../classes/ChangeCommentModel.php";
include "../classes/ChangeCommentController.php";

if($_SESSION["Stanowisko"]=="pracownikDzialuZakupow") {
    $status = new AcceptRejectController($_POST["orderId"], $_POST["action"], 0);
    $status->getStatus();
    $com = new ChangeCommentController($_POST["orderId"], $_POST["komentarz"], $_SESSION["Stanowisko"]);
    $com->getComment();
    header("location: orders.inc.php");
    exit();
}
if(isset($_POST["checkbox"]) && $_SESSION["Stanowisko"]=="specjalistaDsDostaw") {
    $checkDelivery = new AcceptRejectController( 0, 0, $_POST["checkbox"]);
    $checkDelivery->changDeliveryStatus();
    header("location: orders.inc.php");
    exit();
}

//header("location: /orders.inc.php");
?>