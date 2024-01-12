<?php
session_start();
class NewInterviewModel extends Database {

  protected function inputInterview($roomId,$startTime,$stopTime,$date) {
    $sql = "INSERT INTO rozmowy VALUES (?,?,?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    if (!$stmt->execute(array(time(),$roomId,$_SESSION["idKandydataCzas"],$startTime,$stopTime,$date))) {
        $stmt = null;
        header("location: ../subPages/subSubPages/inputNewInterview.page.php?error=stmtfailed");
        exit();
    }
    $stmt = null;
  }
}
