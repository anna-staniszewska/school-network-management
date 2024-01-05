<?php

class EntriesController extends EntriesModel {
    private $schoolID;

    public function __construct($schoolID) {
        $this->schoolID = $schoolID;
    }

    public function getEntries() {
        if($this->emptyInput()==false) {
            //echo "Empty input!";
            header("location: ../subPages/subSubPages/entriesList.page.php?error=emptyGetInput");
            exit();
        }
        $this->selectEntries($this->schoolID);
    }

    public function emptyInput() {
        if(empty($this->schoolID)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


}