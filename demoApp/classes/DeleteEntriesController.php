<?php

class DeleteEntriesController extends DeleteEntriesModel {
    private $entriesID;

    public function __construct($entriesID) {
        $this->entriesID = $entriesID;
    }

    public function deleteEntries() {
        if($this->emptyInput()==false) {
            //echo "Empty input!";
            header("location: ../subPages/subSubPages/entriesList.page.php?error=emptyDeleteInput");
            exit();
        }

        $this->updateEntries($this->entriesID);
    }

    public function emptyInput() {
        if(empty($this->entriesID)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


}