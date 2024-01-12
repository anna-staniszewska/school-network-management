<?php

class NewInterviewController extends NewInterviewModel {
    private $roomId;
    private $startTime;
    private $stopTime;
    private $date;

    public function __construct($roomId,$startTime,$stopTime,$date) {

        $this->roomId = $roomId;
        $this->startTime = $startTime;
        $this->stopTime = $stopTime;
        $this->date = $date;
    }

    public function inputInterviewTemporary() {
        if($this->emptyInput()==false) {
            //echo "Empty input!";
            header("location: ../subPages/subSubPages/inputNewInterview.page.php?error=emptyGetInput");
            exit();
        }
        $this->inputInterview($this->roomId,$this->startTime,$this->stopTime,$this->date);
    }

    public function emptyInput() {
        if(empty($this->roomId)) {
            $result = false;
        }
        else if(empty($this->startTime)) {
            $result = false;
        }
        else if(empty($this->stopTime)) {
            $result = false;
        }
        else if(empty($this->date)) {
            $result = false;
        }
        else {
          $result = true;
        }
        
        return $result;
    }
}
