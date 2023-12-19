<?php
session_start();
class Schedule extends Database {
  protected function getMeetings($schoolId) {

    $sql = "SELECT Rozmowy.DATA AS Data, DATE_FORMAT(Rozmowy.GodzinaRozpoczecia, '%H:%i') AS GodzinaRozpoczecia,
            DATE_FORMAT(Rozmowy.GodzinaZakonczenia, '%H:%i') AS GodzinaZakonczenia,
            Szkola.IdSzkoly, Szkola.Nazwa, Sale.IdSali,
            Kandydaci.Stanowisko, Kandydaci.Imie, Kandydaci.Nazwisko
            FROM Rozmowy
            JOIN Kandydaci ON Rozmowy.IdKandydata=Kandydaci.IdKandydata
            JOIN Sale ON Rozmowy.IdSali=Sale.IdSali
            JOIN Szkola ON Sale.IdSzkoly=Szkola.IdSzkoly 
            WHERE Szkola.IdSzkoly = ?
            ORDER BY Rozmowy.GodzinaRozpoczecia";

    $stmt = $this->connect()->prepare($sql);

    if (!$stmt->execute(array($schoolId))) {
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    if ($stmt->rowCount() == 0) {
      $stmt = null;
      //echo "brak zaplanowanych spotkań";
      header("location: ../index.php?error=meetingsNotFound");
      exit();
    }

    $meetings = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["spotkania"] = $meetings;

    $stmt = null;
  }
}