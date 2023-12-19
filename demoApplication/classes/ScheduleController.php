<?php

class ScheduleController extends Schedule {
    private $schoolId;

    public function __construct($schoolId) {
        $this->schoolId = $schoolId;
    }

    public function getSchedule() {
        if($this->emptyInput()==false) {
            //echo "Empty input!";
            header("location: ../subPages/recruitment.php?error=emptyGetInput");
            exit();
        }
        $this->getMeetings($this->schoolId);
    }

    public function emptyInput() {
        if(empty($this->schoolId)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}