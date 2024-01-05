<?php

class OrdersController extends OrdersModel {
    private $jobPosition;
    private $schoolId;
    public function __construct($jobPosition, $schoolId) {
        $this->jobPosition = $jobPosition;
        $this->schoolId = $schoolId;
    }
    public function getOrders() {
        if($this->emptyInputJP()==false || $this->emptyInputSI()==false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        $this->showOrders($this->jobPosition, $this->schoolId);
    }

    public function emptyInputJP(){
        if(empty($this->jobPosition)){
            return false;
        }
        else{
            return true;
        }
    }

    public function emptyInputSI(){
        if(empty($this->schoolId)){
            return false;
        }
        else{
            return true;
        }
    }
}

?>