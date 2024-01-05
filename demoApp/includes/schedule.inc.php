<?php
session_start();

include "../classes/Database.php";
include "../classes/ScheduleModel.php";
include "../classes/ScheduleController.php";

if(!isset($_SESSION["data"])) {
    $_SESSION["data"] = date('Y-m-d');
}

if(isset($_GET["previous"]))
{
    $_SESSION["data"] = date('Y-m-d', strtotime("-7 day", strtotime($_SESSION["data"])));
    header("location: ../subPages/recruitment.page.php?prev");
}
elseif(isset($_GET["next"]))
{
    $_SESSION["data"] = date('Y-m-d', strtotime("+7 day", strtotime($_SESSION["data"])));
    header("location: ../subPages/recruitment.page.php?next");
}

else{
    $schedule = new ScheduleController($_SESSION["IdSzkoly"]);
    $schedule->getSchedule();
    header("location: ../subPages/recruitment.page.php?error=non");
}
