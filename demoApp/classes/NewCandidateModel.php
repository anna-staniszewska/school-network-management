<?php
session_start();
class NewCandidateModel extends Database {

  protected function inputCandidate($name,$surname,$birthDate,$email,$street,$building,$flat,$city,$phoneNumber,$PESEL,$job) {
    $sql = "INSERT INTO kandydaci VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $_SESSION["idKandydataCzas"] = time();
    if (!$stmt->execute(array($_SESSION["idKandydataCzas"],$job,$name,$surname,$birthDate,$PESEL,$phoneNumber,$email,$city,$street,$building,$flat))) {
        $stmt = null;
        header("location: ../subPages/subSubPages/inputNewInterview.page.php?error=stmtfailed");
        exit();
    }
    $stmt = null;
  }
}
