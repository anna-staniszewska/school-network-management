<?php

class OrdersController extends Orders {
    private $jobPosition;
    private $schoolId;
    public function __construct($jobPosition, $schoolId) {
        $this->jobPosition = $jobPosition;
        $this->schoolId = $schoolId;
    }
    public function getOrders() {
        if($this->emptyInputJP()==false || $this->emptyInputSI()==false) {
            header("location: ../index.php?error=emptyInput");
        }
        $this->showOrders($this->jobPosition, $this->schoolId);
    }

    public function emptyInputJP(){
        if(empty($this->jobPosition)){
            $result=false;
        }
        else{
            $result=true;
        }
    }

    public function emptyInputSI(){
        if(empty($this->schoolId)){
            $result=false;
        }
        else{
            $result=true;
        }
    }
}

?>