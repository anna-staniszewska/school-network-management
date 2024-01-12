<?php

class InputNewInterviewController extends InputNewInterviewModel {
    private $schoolId;

    public function __construct($schoolId) {
        $this->schoolId = $schoolId;
    }

    public function getRoomsTemporary() {
        if($this->emptyInput()==false) {
            //echo "Empty input!";
            header("location: ../subPages/recruitment.page.php?error=emptyGetInput");
            exit();
        }
        $this->getRooms($this->schoolId);
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
