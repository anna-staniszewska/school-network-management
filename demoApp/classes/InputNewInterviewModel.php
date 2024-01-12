<?php
session_start();
class InputNewInterviewModel extends Database {

  protected function getRooms($schoolId) {
    $sql = "SELECT IdSali FROM sale WHERE IdSzkoly = ?";
    $stmt = $this->connect()->prepare($sql);
    if (!$stmt->execute(array($schoolId))) {
        $stmt = null;
        header("location: ../subPages/recruitment.page.php?error=stmtfailed");
        exit();
    }
    if ($stmt->rowCount() == 0) {
      $stmt = null;
      //echo "brak zaplanowanych spotkań";
      header("location: ../subPages/recruitment.page.php?error=roomsNotFound");
      exit();
    }
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["sale"] = $rooms;

    $stmt = null;
  }

  
}
