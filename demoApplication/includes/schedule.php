<?php
session_start();

include "../classes/Database.php";
include "../classes/Schedule.php";
include "../classes/scheduleController.php";

if(!isset($_SESSION["data"])) {
    $_SESSION["data"] = date('Y-m-d');
}

if(isset($_GET["previous"]))
{
    $_SESSION["data"] = date('Y-m-d', strtotime("-7 day", strtotime($_SESSION["data"])));
    header("location: ../subPages/recruitment.php?prev");
}
elseif(isset($_GET["next"]))
{
    $_SESSION["data"] = date('Y-m-d', strtotime("+7 day", strtotime($_SESSION["data"])));
    header("location: ../subPages/recruitment.php?next");
}

else{
    $schedule = new ScheduleController($_SESSION["IdSzkoly"]);
    $schedule->getSchedule();
    header("location: ../subPages/recruitment.php?error=non");
}
