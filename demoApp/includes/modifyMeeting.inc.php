<?php
include "../classes/Database.php";
include "../classes/ModifyMeetingModel.php";
include "../classes/ModifyMeetingControler.php";

include "../classes/ScheduleModel.php";
include "../classes/ScheduleController.php";

if (isset($_POST["submitId"])) {
    //Write informattions about current meeting, and moves to new page
    $_SESSION["IdRozmowy"] = $_POST["IdRozmowy"];

    $getInfo = new \classes\ModifyMeetingControler($_POST["IdRozmowy"]);

    $getInfo->processMeetingInformationsObtainsion($_POST["IdRozmowy"]);

    //$getInfo->getCurrentMeetingInformations($_POST["IdRozmowy"]);

    header("location: ../subPages/subSubPages/modifyMeeting.page.php");

} else if (isset($_POST["submitModify"])) {

    $modifyMeeting = new \classes\ModifyMeetingControler($_SESSION["IdRozmowy"]);

    $modifyMeeting->processMeetingModification($_SESSION["IdRozmowy"], $_POST["startTime"],
        $_POST["endTime"], $_POST["roomId"], $_POST["meetingDate"]);

    //$modifyMeeting->modifyMeetingInformations($_SESSION["IdRozmowy"], $_POST["startTime"],
    //    $_POST["endTime"], $_POST["roomId"], $_POST["meetingDate"]);

    $schedule = new ScheduleController($_SESSION["IdSzkoly"]);
    $schedule->getSchedule();
    header("location: ../subPages/recruitment.page.php?error=non");

    //header("location: ../subPages/recruitment.page.php");

} else if (isset($_POST["submitDelete"])) {

    $deleteMeeting = new \classes\ModifyMeetingControler($_SESSION["IdRozmowy"]);

    $deleteMeeting->processMeetingDeletion($_SESSION["IdRozmowy"]);

    //$deleteMeeting->deleteMeeting($_SESSION["IdRozmowy"]);

    $schedule = new ScheduleController($_SESSION["IdSzkoly"]);
    $schedule->getSchedule();
    header("location: ../subPages/recruitment.page.php?error=non");

    //header("location: ../subPages/recruitment.page.php");


}