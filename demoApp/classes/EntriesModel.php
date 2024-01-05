<?php

class EntriesModel extends Database {
    protected function selectEntries($schoolID) {
        $stmt = $this->connect()->prepare('SELECT * FROM zgloszenia WHERE IdSzkoly = ?;');

        if(!$stmt->execute(array($schoolID))) {
            $stmt = null;
            header("location: ../subPages/subSubPages/entriesList.page.php?error=selectStmtFailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../subPages/subSubPages/entriesList.page.php?error=entries2SelectNotFound");
            exit();
        }

        $selectedEntries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION["zgloszenia"] = $selectedEntries;

        $stmt = null;
    }
}