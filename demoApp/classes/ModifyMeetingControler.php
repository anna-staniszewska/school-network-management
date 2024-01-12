<?php

namespace classes;
use \Datetime;
use \DateTimeZone;
session_start();
class ModifyMeetingControler extends ModifyMeetingModel
{

    public function __construct($idRozmowy)
    {
        $this->idRozmowy = $idRozmowy;
    }

    public function processMeetingInformationsObtainsion($idRozmowy)
    {
        if (!$this->getCurrentMeetingInformations($idRozmowy)){
            header("location: ../subPages/recruitment.page.php?error=failedToGetMeetingData");
            exit();
        }
    }
    public function processMeetingModification($idRozmowy, $startTime, $endTime, $roomId, $date)
    {
        //chack if meeting ends before it actually started
        if (strtotime($startTime) <= strtotime($endTime)){
            $today = date("Y-m-d");

            //check if given date has already passed
            if($date >= $today){
                $this->modifyMeetingInformations($idRozmowy, $startTime, $endTime, $roomId, $date);
            } else{
                header("location: ../subPages/subSubPages/modifyMeeting.page.php?error=theGivenDateHasAlreadyPassed");
                exit();
            }
        } else {
            header("location: ../subPages/subSubPages/modifyMeeting.page.php?error=incorrectMeetingTime");
            exit();
        }
    }

    public function processMeetingDeletion($idRozmowy)
    {
        if (!$this->deleteMeeting($idRozmowy)){
            header("location: ../subPages/subSubPages/modifyMeeting.page.php?error=failedToDeleteMeeting");
            exit();
        }
    }
}