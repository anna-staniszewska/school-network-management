<?php

include "../classes/Database.php";
include "../classes/AcceptRejectModel.php";
include "../classes/AcceptRejectController.php";
include "../classes/ChangeCommentModel.php";
include "../classes/ChangeCommentController.php";

$status = new AcceptRejectController($_POST["orderId"], $_POST["action"]);
$status->getStatus();
$com = new ChangeCommentController($_POST["orderId"], $_POST["komentarz"], $_SESSION["Stanowisko"]);
$com->getComment();
header("location: orders.inc.php");
exit();
//header("location: /orders.inc.php");
?>