<?php

class DeleteEntriesModel extends Database {
    protected function updateEntries($entriesID) {
        $in1 = join(',', array_fill(0, count($entriesID), '?'));
        $in2 = '?';

        $select = <<<SQL
            UPDATE zgloszenia
            SET Zweryfikowano = 1
            WHERE IdZgloszenia IN ($in1)
            AND IdSzkoly = ?;
SQL;

        $stmt = $this->connect()->prepare($select);

        session_start();
        array_push($entriesID, $_SESSION["IdSzkoly"]);

        if(!$stmt->execute($entriesID)) {
            $stmt = null;
            header("location: ../subPages/subSubPages/entriesList.page.php?error=updateStmtFailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../subPages/subSubPages/entriesList.page.php?error=entries2UpdateNotFound");
            exit();
        }

        $stmt = null;
    }
}