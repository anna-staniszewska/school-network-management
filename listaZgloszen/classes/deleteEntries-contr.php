<?php

class DeleteEntriesContr extends DeleteEntries {
    private $entriesID;

    public function __construct($entriesID) {
        $this->entriesID = $entriesID;
    }

    public function deleteEntries() {
        if($this->emptyInput()==false) {
            //echo "Empty input!";
            header("location: ../entriesList.php?error=emptyDeleteInput");
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